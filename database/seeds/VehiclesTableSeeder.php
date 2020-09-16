<?php

use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vehicles')->delete();
        
        \DB::table('vehicles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'molue',
                'alias' => 'long bus',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'lt',
                'alias' => 'medium bus',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'danfo',
                'alias' => 'bus',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'napep',
                'alias' => 'tricycle',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'okada',
                'alias' => 'bike',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'minibus',
                'alias' => '',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'LagBus',
                'alias' => 'BRT',
            ),
        ));
        
        
    }
}