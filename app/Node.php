<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $fillable = ['route_id', 'a_id','b_id'];

    public $timestamps = false;

    public static function store(Route $route, array $strArray) : array {
        self::query()
            ->where('route_id', $route->id)
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
                    $originPlace = Place::firstOrCreate([
                        'name' => $a
                    ]);

                    $destPlace = Place::firstOrCreate([
                        'name' => $b
                    ]);

                    self::firstOrCreate([
                        'route_id' => $route->id,
                        'a_id' => $originPlace->id,
                        'b_id' => $destPlace->id
                    ]);

                }
            }
        }
        return ['status'=>true,'message' => "$count nodes saved"];
    }


    public function origin() {
        return $this->belongsTo(Place::class, 'a_id');
    }

    public function route() {
        return $this->belongsTo(Route::class, 'route_id');
    }

    public function destination() {
        return $this->belongsTo(Place::class, 'b_id');
    }
}
