<?php

use Illuminate\Database\Seeder;

class SearchesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('searches')->delete();
        
        \DB::table('searches')->insert(array (
            0 => 
            array (
                'id' => 1,
                'from' => 'IYANA',
                'to' => 'ABULE',
                'status' => 1,
                'created_at' => '2018-11-09 10:01:30',
                'updated_at' => '2018-11-09 10:58:58',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'from' => 'OWODE',
                'to' => 'IJAIYA',
                'status' => 1,
                'created_at' => '2018-11-10 14:48:31',
                'updated_at' => '2018-11-10 14:48:32',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'from' => 'OSHODI',
                'to' => 'IKEJA',
                'status' => 1,
                'created_at' => '2018-11-11 18:37:30',
                'updated_at' => '2018-11-11 19:30:02',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'from' => 'OWIDE',
                'to' => 'TASK',
                'status' => 1,
                'created_at' => '2018-11-11 21:47:25',
                'updated_at' => '2018-11-11 21:47:25',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'from' => 'SUPER',
                'to' => 'OSHODI',
                'status' => 0,
                'created_at' => '2018-11-11 22:29:41',
                'updated_at' => '2018-11-11 22:29:41',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'from' => 'LAGOS',
                'to' => 'AJAH',
                'status' => 1,
                'created_at' => '2018-11-12 12:46:45',
                'updated_at' => '2018-11-12 12:46:45',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'from' => 'AGEGE',
                'to' => 'COMMAND',
                'status' => 0,
                'created_at' => '2018-11-22 20:43:48',
                'updated_at' => '2018-11-22 20:43:48',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'from' => 'MAGBON',
                'to' => 'OGBA',
                'status' => 1,
                'created_at' => '2019-08-12 06:40:47',
                'updated_at' => '2019-08-12 06:40:47',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'from' => 'AGEGE',
                'to' => 'ILE-EPO',
                'status' => 0,
                'created_at' => '2020-09-16 02:15:47',
                'updated_at' => '2020-09-16 02:15:47',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}