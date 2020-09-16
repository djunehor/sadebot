<?php

use Illuminate\Database\Seeder;

class RoutesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('routes')->delete();
        
        \DB::table('routes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'origin' => 'oshodi',
                'destination' => 'toll gate',
                'price' => 300,
                'distance' => 30,
                'vehicle_id' => 3,
                'nodes' => 'oshodi,shogunle,dopemu,toll gate',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            1 => 
            array (
                'id' => 2,
                'origin' => 'iyana ipaja',
                'destination' => 'agege',
                'price' => 80,
                'distance' => 8,
                'vehicle_id' => 6,
                'nodes' => '',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            2 => 
            array (
                'id' => 3,
                'origin' => 'iyana ipaja',
                'destination' => 'toll gate',
                'price' => 200,
                'distance' => 18,
                'vehicle_id' => 2,
                'nodes' => '',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            3 => 
            array (
                'id' => 4,
                'origin' => 'oshodi',
                'destination' => 'iyana ipaja',
                'price' => 150,
                'distance' => 15,
                'vehicle_id' => 2,
                'nodes' => '',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            4 => 
            array (
                'id' => 5,
                'origin' => 'iyana ipaja',
                'destination' => 'abule egba',
                'price' => 100,
                'distance' => 10,
                'vehicle_id' => 3,
                'nodes' => '',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            5 => 
            array (
                'id' => 6,
                'origin' => 'iyana ipaja',
                'destination' => 'agbado',
                'price' => 150,
                'distance' => 13,
                'vehicle_id' => 3,
                'nodes' => '',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            6 => 
            array (
                'id' => 7,
                'origin' => 'abule egba',
                'destination' => 'command',
                'price' => 100,
                'distance' => 9,
                'vehicle_id' => 4,
                'nodes' => 'abule egba,ekoro,ile iwe,car wash,command',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            7 => 
            array (
                'id' => 8,
                'origin' => 'ile epo',
                'destination' => 'command',
                'price' => 70,
                'distance' => 7,
                'vehicle_id' => 4,
                'nodes' => 'ile epo,ekoro,ile iwe,car wash,command',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            8 => 
            array (
                'id' => 17,
                'origin' => 'iyana oworo',
                'destination' => 'tbs',
                'price' => 80,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'iyana oworo,tbs',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            9 => 
            array (
                'id' => 18,
                'origin' => 'ikorodu',
                'destination' => 'mile 12',
                'price' => 150,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'ikorodu,mile 12',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            10 => 
            array (
                'id' => 19,
                'origin' => 'festac',
                'destination' => 'cms',
                'price' => 150,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'festac,cms',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            11 => 
            array (
                'id' => 20,
                'origin' => 'inner marina',
                'destination' => 'mile 12',
                'price' => 200,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'inner marina,mile 12',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            12 => 
            array (
                'id' => 21,
                'origin' => 'ketu alapere',
                'destination' => 'tbs',
                'price' => 100,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'ketu alapere,tbs',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            13 => 
            array (
                'id' => 22,
                'origin' => 'obalende',
                'destination' => 'mile 12',
                'price' => 300,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'obalende,mile 12',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            14 => 
            array (
                'id' => 24,
                'origin' => 'ikorodu',
                'destination' => 'obalende',
                'price' => 200,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'ikorodu,obalende',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            15 => 
            array (
                'id' => 25,
                'origin' => 'leventis',
                'destination' => 'cms',
                'price' => 100,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'leventis,cms',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            16 => 
            array (
                'id' => 26,
                'origin' => 'agege pen cinema',
                'destination' => 'oshodi',
                'price' => 200,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'agege pen cinema,oshodi',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            17 => 
            array (
                'id' => 27,
                'origin' => 'ikorodu agric',
                'destination' => 'maryland',
                'price' => 150,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'ikorodu agric,maryland',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            18 => 
            array (
                'id' => 28,
                'origin' => 'oshodi',
                'destination' => 'apapa',
                'price' => 200,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'oshodi,ilasa,iyana itire,cele,coker,mile 2,apapa',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            19 => 
            array (
                'id' => 30,
                'origin' => 'ojodu berger',
                'destination' => 'ikeja inside',
                'price' => 150,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'ojodu berger,ikeja inside',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            20 => 
            array (
                'id' => 31,
                'origin' => 'mile 2',
                'destination' => 'cms',
                'price' => 150,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'mile 2,cms',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            21 => 
            array (
                'id' => 32,
                'origin' => 'oshodi',
                'destination' => 'abule egba',
                'price' => 250,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'oshodi,abule egba',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            22 => 
            array (
                'id' => 33,
                'origin' => 'mile 12',
                'destination' => 'yaba',
                'price' => 150,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'mile 12,yaba',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            23 => 
            array (
                'id' => 35,
                'origin' => 'abule egba',
                'destination' => 'sango toll gate',
                'price' => 150,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'abule egba,sango toll gate',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            24 => 
            array (
                'id' => 36,
                'origin' => 'yaba',
                'destination' => 'iyana ipaja',
                'price' => 250,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'yaba,iyana ipaja',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            25 => 
            array (
                'id' => 37,
                'origin' => 'agege',
                'destination' => 'sango toll gate',
                'price' => 300,
                'distance' => 0,
                'vehicle_id' => 3,
                'nodes' => 'agege,sango toll gate',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            26 => 
            array (
                'id' => 38,
                'origin' => 'oshodi',
                'destination' => 'yaba',
                'price' => 150,
                'distance' => 10,
                'vehicle_id' => 3,
                'nodes' => 'oshodi,ilupeju,anthony,obanikoro,jibowu,yaba',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
            27 => 
            array (
                'id' => 39,
                'origin' => 'adebisi',
                'destination' => 'afolasade',
                'price' => 200,
                'distance' => 40,
                'vehicle_id' => 3,
                'nodes' => 'adebisi,afolasade',
                'created_at' => '2020-09-16 01:53:17',
                'updated_at' => '2020-09-16 01:53:17',
            ),
        ));
        
        
    }
}