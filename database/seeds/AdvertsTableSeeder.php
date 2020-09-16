<?php

use Illuminate\Database\Seeder;

class AdvertsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('adverts')->delete();
        
        \DB::table('adverts')->insert(array (
            0 => 
            array (
                'AID' => 1,
                'PID' => 30,
                'CID' => 0,
                'details' => 'Visit our hotel beside Evaton College, Ekoro road',
                'status' => 1,
            ),
        ));
        
        
    }
}