<?php

use Illuminate\Database\Seeder;

class AuthAppsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('auth_apps')->delete();
        
        \DB::table('auth_apps')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_string' => 'JKHjk8987jhkHJGJ',
                'name' => 'test.sadebot.com',
                'abolished' => 0,
                'abolished_at' => NULL,
                'abolished_by' => NULL,
                'created_at' => '2018-10-19 15:03:55',
                'updated_at' => '2018-10-19 15:03:55',
            ),
        ));
        
        
    }
}