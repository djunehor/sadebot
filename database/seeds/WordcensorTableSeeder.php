<?php

use Illuminate\Database\Seeder;

class WordcensorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('wordcensor')->delete();
        
        \DB::table('wordcensor')->insert(array (
            0 => 
            array (
                'censor_id' => 1,
                'word_to_censor' => 'SHIT',
                'replace_with' => 'S***',
                'bot_exclude' => '',
            ),
            1 => 
            array (
                'censor_id' => 2,
                'word_to_censor' => 'fuck',
                'replace_with' => 'f***',
                'bot_exclude' => '',
            ),
        ));
        
        
    }
}