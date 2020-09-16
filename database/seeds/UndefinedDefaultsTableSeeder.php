<?php

use Illuminate\Database\Seeder;

class UndefinedDefaultsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('undefined_defaults')->delete();
        
        
        
    }
}