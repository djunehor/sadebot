<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Route extends Model
{

    protected $fillable = [
        'origin',
        'destination',
        'price',
        'distance',
        'nodes',
        'vehicle_id'
    ];

    public static function store(array $data) : array {

        $insertData['origin'] = str_replace('-',' ',strtolower($data['origin']));
        $insertData['destination'] = str_replace('-',' ',strtolower($data['destination']));
        $insertData['price'] = $data['price'];
        $insertData['distance'] = $data['distance'];
        $insertData['vehicle_id'] = $data['vehicle_id'];
        $insertData['nodes'] = strtolower($data['nodes']);
        $strArray = explode(",", $insertData['nodes']); //convert nodes to array

        if(Route::query()
                ->where(function($q) use($insertData) {
                    $q->where('origin', $insertData['origin'])
                        ->where('destination', $insertData['destination']);
                })
                ->orWhere(function($q) use($insertData) {
                    $q->where('origin', $insertData['destination'])
                        ->where('destination', $insertData['origin']);
                })
        ->exists()
       ) {
            return [
                'status' => false,
                'message' => "Route ".$insertData['A']." to ".$insertData['B']." already exists!"
            ];
        }

        $max = count($strArray)-1;

        if($strArray[0] != $insertData['A']) {
            return [
                'status' => false,
                'message' =>"Origin <b>".$insertData['A']."</b> must match first node <b>".$strArray[0]."</b>"
                ];
        } elseif($strArray[$max]!= $insertData['B']) {

            return [
                'status' => false,
                'message' =>"Destination <b>".$insertData['B']."</b> must match last node <b>".$strArray[$max]."</b>"
                ];
        }

        $route = Route::create($insertData);

        return Node::store($route, $strArray);
    }

    public static function updateRoute(Route $route, array $data) {

        $insertData['origin'] = str_replace('-',' ',strtolower($data['origin']));
        $insertData['destination'] = str_replace('-',' ',strtolower($data['destination']));
        $insertData['price'] = $data['price'];
        $insertData['distance'] = $data['distance'];
        $insertData['vehicle_id'] = $data['vehicle_id'];
        $insertData['nodes'] = strtolower($data['nodes']);
        $strArray = explode(",", $insertData['nodes']); //convert nodes to array

        if(Route::query()
            ->where('id', '<>', $route->id)
            ->where(function($q) use($insertData) {
                $q->where('origin', $insertData['origin'])
                    ->where('destination', $insertData['destination']);
            })
            ->orWhere(function($q) use($insertData) {
                $q->where('origin', $insertData['destination'])
                    ->where('destination', $insertData['origin']);
            })
            ->exists()
        ) {
            return [
                'status' => false,
                'message' => "Route ".$insertData['A']." to ".$insertData['B']." already exists!"
            ];
        }

        $max = count($strArray)-1;

        if($strArray[0] != $insertData['origin']) {
            return [
                'status' => false,
                'message' =>"Origin <b>".$insertData['origin']."</b> must match first node <b>".$strArray[0]."</b>"
            ];
        } elseif($strArray[$max]!= $insertData['destination']) {

            return [
                'status' => false,
                'message' =>"Destination <b>".$insertData['destination']."</b> must match last node <b>".$strArray[$max]."</b>"
            ];
        }

        $route->update($insertData);

        return Node::store($route, $strArray);
    }

    public function nodes() {
        return $this->hasMany(Node::class, 'route_id');
    }

    public function vehicle() {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

}
