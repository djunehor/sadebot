<?php

use Illuminate\Database\Seeder;

class AuthTokensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('auth_tokens')->delete();
        
        
        
    }
}