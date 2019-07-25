<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BotModel extends Model
{
    private static $apiUrl = 'https://maps.googleapis.com/maps/api/directions/json';
    private static $googleKey = 'AIzaSyAgMUkvlrlZ3t03Lo3kd_sihUfvbasbTK0';

    public static function getDirections($input) {

        //first get from and to
        $mode = "driving";
        $command = strtoupper($input);

            $pieces = explode(" ",$command);
            $from = $pieces[array_search('FROM', $pieces) + 1];
            $pieces = explode(" ", $command);
            $to = $pieces[array_search('TO',$pieces) + 1];

            $search = Search::where('from', $from)->orWhere('to', $to)->first();

            if(!$search) {
                $search = Search::create(['from' => $from, 'to' => $to]);
            }

            if( empty($from) ) {
                return "I didn't detect any starting address in your message. A good format is FROM IKOTUN,LAGOS TO IGANDO,LAGOS. Ensure you separate compound names with an hypen e.g. iyana-ipaja";
            }

            if(empty($to)) {

                return "I didn't detect any destination address in your message. A good format is FROM IKOTUN,LAGOS TO IGANDO,LAGOS. Ensure you separate compound names with an hypen e.g. iyana-ipaja";
            }

            if( strchr($command,'MODE') ) {
                $pieces = explode(" ",$command);
                $mode = strtolower($pieces[array_search('MODE',$pieces)+1]);
            }

            if ( !in_array($mode, array('transit','walking','bicycling','driving')) )
            {
                return "Invalid Mode: Only 'transit','walking','bicycling','driving' allowed!";
            }


        $_distArr = array();

        //the start and the end
        $start = strtolower(str_replace('-',' ', $from));
        $end = strtolower(str_replace('-',' ', $to));

        //quick check data
        //DB::enableQueryLog();

        if(DB::table(PlaceModel::TABLE)
                ->where('pname', 'LIKE', '%'. $start .'%')
                ->count() < 1
        || DB::table(PlaceModel::TABLE)
                ->where('pname', 'LIKE', '%'. $end. '%')
                ->count() < 1) {

            //$laQuery = DB::getQueryLog();
            $search->status = 1;
            $search->save();
            return "Place <b>$start or $end</b> doesn't exist in our records.";
        }

        else {
            $ao = DB::table(PlaceModel::TABLE)
                ->where('pname', 'LIKE', "%$start%")
                ->get()->toArray();

            $a = $ao[0]->PID;

            $bo = DB::table(PlaceModel::TABLE)
                ->where('pname', 'LIKE', "%$end%")
                ->get()->toArray();

            $b = $bo[0]->PID;

        }


        //1. Get all node that relate FROM to TO
        $select = DB::table(PlaceModel::NODE_TABLE)
            ->where('a', $a)
            ->orWhere('b', $a)
            ->orWhere('a', $b)
            ->orWhere('b', $a)
            ->get();

        if(empty($select)) {
            return 'Unable to select a and b';
        }

        foreach($select as $y) {
            $y = (array) $y;
            $m = $y['a'];

            //get all node related to selected node.
            //this will serve as connections between our FROM and TO

            $select2 = DB::table(PlaceModel::NODE_TABLE)
                ->where('a', $m)
                ->orWhere('b', $m)
                ->get();

            if(empty($select2)) {
                return 'Unable to select next a and b';
            }

            foreach($select2 as $j) {
                $j = (array) $j;

                $o2 = $j['a'];

                $p2 = $j['b'];

                $c2 = 0; //distance between a and b of current node. This will help determine shortest route


                //save selected node as 2-D array
                $_distArr[$o2][$p2] = $c2;
            }
        }


        //die();
        //initialize the array for storing
        $S = array();//the nearest path with its parent and weight
        $Q = array();//the left nodes without the nearest path

        foreach(array_keys($_distArr) as $val)
            $Q[$val] = 99999;
            $Q[$a] = 0;

        //start calculating
        while(!empty($Q)){
            $min = array_search(min($Q), $Q);//the most min weight

            if($min == $b) break;

            foreach($_distArr[$min] as $key=>$val) {
                if (!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
                    $Q[$key] = $Q[$min] + $val;
                    $S[$key] = array($min, $Q[$key]);
                }
            }

            unset($Q[$min]);
        }

        //list the path
        $path = array();
        $pos = $b;

        //incase no route is found to connect FROM to TO. This also prevents infinite loop
        if (!array_key_exists($b, $S)) {
            return self::googleDirections($start, $end, $mode);
        }

        while($pos != $a){
            $path[] = $pos;
            $pos = $S[$pos][0];
        }

        $path[] = $a;
        $path = array_reverse($path);

        //Generate path results
        $result = "";

        $result .= "Directions from <span style='color:blue;'><b>".strtoupper($start)."</b></span> to <span style='color:red;'><b>".strtoupper($end)."</b></span>";

        $mmm = "";
        $price = 0;
        $distance = 0;

        for($i = 0; $i < (count($path) - 1); $i++) {
            $firstC = $path[$i];
            $firstD = $path[$i+1];

            $ss = DB::table(RouteModel::TABLE)
                ->join(PlaceModel::NODE_TABLE, RouteModel::TABLE.'.RID', '=', PlaceModel::NODE_TABLE.'.RID')
                ->join(VehicleModel::TABLE, RouteModel::TABLE.'.type', '=', VehicleModel::TABLE.'.VID')
                ->where(PlaceModel::NODE_TABLE.'.a', $firstC)
                ->where(PlaceModel::NODE_TABLE.'.b', $firstD)
                ->orderBy(RouteModel::TABLE.'.rprice')
                ->limit(1)
                ->get()->toArray();

            $l = (array) $ss[0];
            $secondC = DB::table(PlaceModel::TABLE)
                ->where('PID', $firstC)
                ->get()->toArray();

            $c = $secondC[0]->pname.' '.$secondC[0]->alias;

            $secondD = DB::table(PlaceModel::TABLE)
                ->where('PID', $firstD)
                ->get()->toArray();

            $d = $secondD[0]->pname.' '.$secondD[0]->alias;

            $mmm.= ($i==0) ? "<br>From <b>".$start."</b> " : "<br><br>From <b>".$c."</b> ";
            $mmm .= "<br>Take a/an ".strtoupper($l['vname'])." ";
            $mmm .= '<br>Connecting <b>'.$l['A'].'</b> - <b>'.$l['B'].'</b>';
            $mmm .= (isset($d) && ($d != $start)) ? "<br>Facing <b>".$d."</b>" : null;
            $mmm .= ' - N'.$l['rprice'];

            $price += $l['rprice'];
            $distance += $l['rdistance'];

            $mmm .= ($i==count($path)-1) ? '' : '<br>Get off at <b>'.$d.'</b>';
        }

        $mmm .="<br>Trek to your destination.<br><br>Total Cost: <b>N$price</b><br>Approximate distance: <b>$distance km</b>";


        //add adverts
        return $result.$mmm;
    }

    public static function getDefinitions($input) {
        $output = "Sorry, is that an English word?";
        $command = strtolower($input);

        if(strchr($command,'define')) {
            $pieces = explode(" ",$command);
            $from = ucfirst($pieces[array_search('DEFINE',$pieces)+1]);

            $check = DB::table(DictionaryModel::TABLE)
                ->where('word', $from)
                ->get()->toArray();

            if(empty($check)) {
                $output = "I cannot define <b>$from</b>. Try another word.";
            } else {
                $output = "<b>$from</b> MEANS ".$check[0]->definition;
            }
        }

       return $output;
    }

    public static function googleDirections($from, $to, $mode)
    {
        $message = "Found no pathway to connect <b>$from</b> to <b>$to</b>.<br>Ensure the names are correctly spelt.<br>Compound names should be seperated with an hypen e.g. iyana ipaja should be written as iyana-ipaja.<br>Also try to be specific incase there are multiple places with same name e.g type ikeja-along instead of ikeja.";

        //The Google Directions API URL. Do not change this.
        $apiUrl = self::$apiUrl;

        //Construct the URL that we will visit with cURL.
        $url = $apiUrl . '?' . 'origin=' . urlencode($from) . '&destination=' . urlencode($to) . '&mode=' . $mode . '&key='.self::$googleKey;

        //Initiate cURL.
        $res = UtilitiesModel::getWebPage($url);

        Log::info('GOOGLE RESPONSE: '  . json_encode($res));

        //Decode the JSON data we received.
        $json = json_decode($res);
        $i = 0;
        $directions = "";

        while (!empty($json->routes[0]->legs[0]->steps[$i]->html_instructions)) {
            $directions .= $json->routes[0]->legs[0]->steps[$i]->html_instructions . '<br>';
            $i++;
        }

        //Decode the JSON data we received.
            $json = json_decode(trim($res), true);

            //Automatically select the first route that Google gave us.
        $totalDistance = 0;
        if(!is_null($json) && array_key_exists(0, $json)) {
            $route = $json['routes'][0];

            //Loop through the "legs" in our route and add up the distances.

            foreach ($route['legs'] as $leg) {
                $totalDistance = $totalDistance + $leg['distance']['value'];
            }

            //Divide by 1000 to get the distance in KM.
            $totalDistance = round($totalDistance / 1000);
        }

        //Print out the result.
        if(!empty($directions)) {
            $message .= "<br>I searched google instead.<h5>Google $mode directions for <b>$from</b> to <b>$to</b></h5>";
            $message .= $directions;
            $message .= 'Total distance is <b>' . $totalDistance . 'km</b>';
        } else {
            $message .= "I didn't find have any google <b>$mode</b> directions for <b>$from</b> TO <b>$to</b>.";
            $message .= "<br>Try another travel mode: <b>driving</b> | <b>walking</b> | <b>bicycling</b> | <b>transit</b>";
            $message .= "<br>Ensure the names are correctly spelt.<br>Compound names should be seperated with an hypen e.g. iyana ipaja should be written as iyana-ipaja.<br>Also try to be specific incase there are multiple places with same name e.g type ikeja-along instead of ikeja.";

        }

        return $message;
    }
}
