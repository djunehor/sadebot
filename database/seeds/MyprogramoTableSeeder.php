<?php

use Illuminate\Database\Seeder;

class MyprogramoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('myprogramo')->delete();
        
        \DB::table('myprogramo')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_name' => 'dmorton@geekcavecreations.com',
                'password' => '986fb4494b455629e27ba1d1ad8cfdc8',
                'last_ip' => '127.0.0.1',
                'last_login' => '2017-06-18 14:49:02',
            ),
            1 => 
            array (
                'id' => 2,
                'user_name' => 'SuperMod',
                'password' => '66d5147673def7f7db4a2a5e8f033d7b',
                'last_ip' => '197.210.44.250',
                'last_login' => '2018-12-02 16:55:14',
            ),
        ));
        
        
    }
}