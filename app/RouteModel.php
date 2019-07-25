<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RouteModel extends Model
{
    public const TABLE = 'routes';

    public function create($data) {
        $insertData['A'] = str_replace('-',' ',strtolower($data['from']));
        $insertData['B'] = str_replace('-',' ',strtolower($data['to']));
        $insertData['rprice'] = $data['price'];
        $insertData['rdistance'] = $data['distance'];
        $insertData['type'] = !empty($data['type']) ? strtolower($data['type']) : 3;
        $insertData['nodes'] = strtolower($data['nodes']);
        $strArray = explode(",", $insertData['nodes']); //convert nodes to array

        if(DB::table(self::TABLE)
        ->where('a', $insertData['A'])
        ->where('b', $insertData['B'])
        ->count() > 0
        ||
            DB::table(self::TABLE)
                ->where('b', $insertData['A'])
                ->where('a', $insertData['B'])
                ->count() > 0
        ) {
            return "Route ".$insertData['A']." to ".$insertData['B']." already exists!";
        }

        $max = count($strArray)-1;

        if($strArray[0] != $insertData['A']) {
            return "From <b>".$insertData['A']."</b> must match first node <b>".$strArray[0]."</b>";
        } elseif($strArray[$max]!= $insertData['B']) {

            return "To <b>".$insertData['B']."</b> must match last node <b>".$strArray[$max]."</b>";
        }

        $insert = DB::table(self::TABLE)
            ->insertGetId($insertData);

        if(!$insert) {
            return 'Failed to add route!';
        }

        DB::table(PlaceModel::NODE_TABLE)
            ->where('RID', $insert)
            ->delete();

        //get all possible combinations of 2 nodes
        $count = 0;
        foreach ($strArray as $key => $char1) {
            $strArray2 = $strArray;
            unset($strArray2[$key]);

            foreach ($strArray2 as $char2) {
                $count++;
                $a = str_replace('-',' ',$char1);
                $b = str_replace('-',' ',$char2);

                //first check if node is not empty or less than 3 words
                if(strlen($a) >= 3 && strlen($b) >= 3) {

                    //check if place is saved
                    $getPID = DB::table(PlaceModel::TABLE)->where('pname', $a)->get()->toArray();

                    if(!empty($getPID)) {
                        $a = $getPID[0]->PID;
                    } else {
                        $PID = DB::table(PlaceModel::TABLE)->insertGetId(['pname' => $a]);
                        $a = $PID;
                    }

                    $getPID = DB::table(PlaceModel::TABLE)->where('pname', $b)->get()->toArray();

                    if(!empty($getPID)) {
                        $b = $getPID[0]->PID;
                    } else {
                        $PID = DB::table(PlaceModel::TABLE)->insertGetId(['pname' => $b]);
                        $b = $PID;
                    }

                    if(DB::table(PlaceModel::NODE_TABLE)
                    ->where('a', $a)
                    ->where('b', $b)
                    ->where('RID', $insert)
                    ->count() < 1) {
                      DB::table(PlaceModel::NODE_TABLE)->insert(['RID' => $insert, 'a' => $a, 'b' => $a]);
                    }
                }
            }
        }
        return $count." nodes saved";
    }

    public function updateRoute($id, $data) {
        $insertData['A'] = str_replace('-',' ',strtolower($data['from']));
        $insertData['B'] = str_replace('-',' ',strtolower($data['to']));
        $insertData['rprice'] = $data['price'];
        $insertData['rdistance'] = $data['distance'];
        $insertData['type'] = !empty($data['type']) ? strtolower($data['type']) : 3;
        $insertData['nodes'] = strtolower($data['nodes']);
        $strArray = explode(",", $insertData['nodes']); //convert nodes to array

        if(DB::table(self::TABLE)
                ->where('RID', $id)
                ->count() < 1
        ) {
            return "Route ".$insertData['A']." to ".$insertData['B']." doesn't exists!";
        }

        $max = count($strArray)-1;

        if($strArray[0] != $insertData['A']) {
            return "From <b>".$insertData['A']."</b> must match first node <b>".$strArray[0]."</b>";
        } elseif($strArray[$max]!= $insertData['B']) {

            return "To <b>".$insertData['B']."</b> must match last node <b>".$strArray[$max]."</b>";
        }

        $update = DB::table(self::TABLE)
            ->where('RID', $id )
            ->update($insertData);

        DB::table(PlaceModel::NODE_TABLE)
            ->where('RID', $id)
            ->delete();

        $insert = $id;

        //get all possible combinations of 2 nodes
        $count = 0;
        foreach ($strArray as $key => $char1) {
            $strArray2 = $strArray;
            unset($strArray2[$key]);

            foreach ($strArray2 as $char2) {
                $count++;
                $a = str_replace('-',' ',$char1);
                $b = str_replace('-',' ',$char2);

                //first check if node is not empty or less than 3 words
                if(strlen($a) >= 3 && strlen($b) >= 3) {

                    //check if place is saved
                    $getPID = DB::table(PlaceModel::TABLE)->where('pname', $a)->get()->toArray();

                    if(!empty($getPID)) {
                        $a = $getPID[0]->PID;
                    } else {
                        $PID = DB::table(PlaceModel::TABLE)->insertGetId(['pname' => $a]);
                        $a = $PID;
                    }

                    $getPID = DB::table(PlaceModel::TABLE)->where('pname', $b)->get()->toArray();

                    if(!empty($getPID)) {
                        $b = $getPID[0]->PID;
                    } else {
                        $PID = DB::table(PlaceModel::TABLE)->insertGetId(['pname' => $b]);
                        $b = $PID;
                    }

                    if(DB::table(PlaceModel::NODE_TABLE)
                            ->where('a', $a)
                            ->where('b', $b)
                            ->where('RID', $insert)
                            ->count() < 1) {
                        DB::table(PlaceModel::NODE_TABLE)->insert(['RID' => $insert, 'a' => $a, 'b' => $a]);
                    }
                }
            }
        }
        return $count." nodes saved";
    }

    public function allRoutes($request) {

        $get = DB::table(self::TABLE)->paginate(15, ['*'], 'page', $request->get('page'));

        return $get;
    }

    public function deleteRoute($id) {
        $get = DB::table(self::TABLE)
            ->where('RID', $id)
            ->delete();

        //delete nodes
        $get2 = DB::table(PlaceModel::NODE_TABLE)
            ->where('RID', $id)
            ->delete();

        return 'Route and nodes deleted successfully';
    }

    public function getSingle($id) {
        $get = DB::table(self::TABLE)
            ->where('RID', $id)
            ->get()->toArray();

        return !empty($get) ? (array) $get[0]: [];
    }

    public function addUncovered($a, $b) {
        DB::table('uncovered')
            ->insert(['a' => $a, 'b' => $b]);
    }
}
