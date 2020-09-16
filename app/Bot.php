<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Bot extends Model
{
    private static $apiUrl = 'https://maps.googleapis.com/maps/api/directions/json';
    private static $googleKey = 'AIzaSyAgMUkvlrlZ3t03Lo3kd_sihUfvbasbTK0';

    public static function getDirections($input) {

        //first get from and to
        $mode = "driving";
        $command = strtoupper($input);

            $pieces = explode(" ",$command);
            $from = $pieces[array_search('FROM', $pieces) + 1];
            $to = $pieces[array_search('TO',$pieces) + 1];

            $search = Search::firstOrCreate(['from' => $from, 'to' => $to]);

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

        if(!Place::query()
                ->where('name', 'LIKE', '%'. $start .'%')
                ->orWhere('name', 'LIKE', '%'. $end .'%')
                ->exists()
        ) {

            //$laQuery = DB::getQueryLog();
            $search->status = 1;
            $search->save();
            return "Place <b>$start or $end</b> doesn't exist in our records.";
        }

        else {
            $startPlace = Place::query()
                ->where('name', 'LIKE', "%$start%")
                ->first(['id']);

            $a = $startPlace->id;

            $endPlace = Place::query()
                ->where('name', 'LIKE', "%$end%")
                ->first(['id']);

            $b = $endPlace->id;

        }


        //1. Get all node that relate FROM to TO
        $availablePlaces = Node::query()
            ->where('a_id', $a)
            ->orWhere('b_id', $a)
            ->orWhere('a_id', $b)
            ->orWhere('b_id', $a)
            ->get(['a_id', 'b_id']);

        if(!count($availablePlaces)) {
            return 'Unable to identify origin/destination';
        }

        foreach($availablePlaces as $y) {

            //get all node related to selected node.
            //this will serve as connections between our FROM and TO

            $originPlaces = Node::query()
                ->where('a_id', $y->a_id)
                ->orWhere('b_id', $y->a_id)
                ->get(['a_id', 'b_id']);

            if(!count($originPlaces)) {
                return 'Unable to get connecting route';
            }

            foreach($originPlaces as $j) {

                $o2 = $j->a_id;

                $p2 = $j->b_id;
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

            $calculatedRoute = Route::query()
                ->wherehas('nodes', function($q) use($firstC, $firstD) {
                    $q->where('a_id', $firstC)
                        ->where('b_id', $firstD);
                    })
                ->orderBy('price')
                ->with(['vehicle', 'nodes'])
                ->first();

            $secondC = Place::find($firstC);

            $c = $secondC->name.' '.$secondC->alias;

            $secondD = Place::find($firstD);

            $d = $secondD->name.' '.$secondD->alias;

            $mmm.= ($i==0) ? "<br>From <b>".$start."</b> " : "<br><br>From <b>".$c."</b> ";
            $mmm .= "<br>Take a/an ".strtoupper($calculatedRoute->vehicle->name)." ";
            $mmm .= '<br>Connecting <b>'.$calculatedRoute->origin.'</b> - <b>'.$calculatedRoute->destination.'</b>';
            $mmm .= (isset($d) && ($d != $start)) ? "<br>Facing <b>".$d."</b>" : null;
            $mmm .= ' - N'.$calculatedRoute->price;

            $price += $calculatedRoute->price;
            $distance += $calculatedRoute->distance;

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

            $check = Dictionary::query()
                ->where('word', $from)
                ->first();

            if(!$check) {
                $output = "I cannot define <b>$from</b>. Try another word.";
            } else {
                $output = "<b>$from</b> MEANS ".$check->definition;
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
        $res = httpRequest($url);

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
