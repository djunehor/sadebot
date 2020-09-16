<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('places')->delete();
        
        \DB::table('places')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'oshodi',
                'alias' => '',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'bolade',
                'alias' => '',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'shogunle',
                'alias' => '',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'pwd',
                'alias' => '',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'ikeja national',
                'alias' => '',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'ikeja along',
                'alias' => '',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'mangoro',
                'alias' => '',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'cement',
                'alias' => '',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'dopemu',
                'alias' => '',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'araromi',
                'alias' => '',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'iyana ipaja',
                'alias' => '',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'pleasure',
                'alias' => '',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'ile epo',
                'alias' => '',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'super',
                'alias' => '',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'oja iba',
                'alias' => '',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'abule egba',
                'alias' => '',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'awori',
                'alias' => '',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'u turn',
                'alias' => '',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'meiran',
                'alias' => '',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'agbado',
                'alias' => '',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'ijaiye',
                'alias' => '',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'amje',
                'alias' => '',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'alakuko',
                'alias' => '',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'toll gate',
                'alias' => '',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'abekoko',
                'alias' => '',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'mulero',
                'alias' => '',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'agege',
                'alias' => '',
            ),
            27 => 
            array (
                'id' => 29,
                'name' => ' abule egba',
                'alias' => '',
            ),
            28 => 
            array (
                'id' => 30,
                'name' => 'ekoro',
                'alias' => '',
            ),
            29 => 
            array (
                'id' => 31,
                'name' => 'ile iwe',
                'alias' => '',
            ),
            30 => 
            array (
                'id' => 32,
                'name' => 'car wash',
                'alias' => '',
            ),
            31 => 
            array (
                'id' => 33,
                'name' => 'command',
                'alias' => '',
            ),
            32 => 
            array (
                'id' => 34,
                'name' => 'iyana oworo',
                'alias' => NULL,
            ),
            33 => 
            array (
                'id' => 35,
                'name' => 'tbs',
                'alias' => NULL,
            ),
            34 => 
            array (
                'id' => 36,
                'name' => 'ikorodu',
                'alias' => NULL,
            ),
            35 => 
            array (
                'id' => 37,
                'name' => 'mile 12',
                'alias' => NULL,
            ),
            36 => 
            array (
                'id' => 38,
                'name' => 'festac',
                'alias' => NULL,
            ),
            37 => 
            array (
                'id' => 39,
                'name' => 'cms',
                'alias' => NULL,
            ),
            38 => 
            array (
                'id' => 40,
                'name' => 'inner marina',
                'alias' => NULL,
            ),
            39 => 
            array (
                'id' => 41,
                'name' => 'ketu alapere',
                'alias' => NULL,
            ),
            40 => 
            array (
                'id' => 42,
                'name' => 'obalende',
                'alias' => NULL,
            ),
            41 => 
            array (
                'id' => 43,
                'name' => 'yaba',
                'alias' => NULL,
            ),
            42 => 
            array (
                'id' => 44,
                'name' => 'leventis',
                'alias' => NULL,
            ),
            43 => 
            array (
                'id' => 45,
                'name' => 'agege pen cinema',
                'alias' => NULL,
            ),
            44 => 
            array (
                'id' => 46,
                'name' => 'ikorodu agric',
                'alias' => NULL,
            ),
            45 => 
            array (
                'id' => 47,
                'name' => 'maryland',
                'alias' => NULL,
            ),
            46 => 
            array (
                'id' => 48,
                'name' => 'ilasa',
                'alias' => NULL,
            ),
            47 => 
            array (
                'id' => 49,
                'name' => 'iyana itire',
                'alias' => NULL,
            ),
            48 => 
            array (
                'id' => 50,
                'name' => 'cele',
                'alias' => NULL,
            ),
            49 => 
            array (
                'id' => 51,
                'name' => 'coker',
                'alias' => NULL,
            ),
            50 => 
            array (
                'id' => 52,
                'name' => 'mile 2',
                'alias' => NULL,
            ),
            51 => 
            array (
                'id' => 53,
                'name' => 'apapa',
                'alias' => NULL,
            ),
            52 => 
            array (
                'id' => 54,
                'name' => 'ojodu berger',
                'alias' => NULL,
            ),
            53 => 
            array (
                'id' => 55,
                'name' => 'ikeja inside',
                'alias' => NULL,
            ),
            54 => 
            array (
                'id' => 56,
                'name' => 'sango toll gate',
                'alias' => NULL,
            ),
            55 => 
            array (
                'id' => 57,
                'name' => 'ilupeju',
                'alias' => NULL,
            ),
            56 => 
            array (
                'id' => 58,
                'name' => 'anthony',
                'alias' => NULL,
            ),
            57 => 
            array (
                'id' => 59,
                'name' => 'obanikoro',
                'alias' => NULL,
            ),
            58 => 
            array (
                'id' => 60,
                'name' => 'jibowu',
                'alias' => NULL,
            ),
            59 => 
            array (
                'id' => 61,
                'name' => 'adebisi',
                'alias' => NULL,
            ),
            60 => 
            array (
                'id' => 62,
                'name' => 'afolasade',
                'alias' => NULL,
            ),
        ));
        
        
    }
}