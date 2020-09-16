<?php

use Illuminate\Database\Seeder;

class BotsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bots')->delete();
        
        \DB::table('bots')->insert(array (
            0 => 
            array (
                'bot_id' => 1,
                'bot_name' => 'SadeBot',
                'bot_desc' => 'Super AI that helps you find transit directions within Nigeria and also your chat buddy',
                'bot_active' => 1,
                'bot_parent_id' => 1,
                'format' => 'json',
                'save_state' => 'database',
                'conversation_lines' => 1,
                'remember_up_to' => 1000,
                'debugemail' => 'djunehor@gmail.com',
                'debugshow' => 1,
                'debugmode' => 1,
                'error_response' => 'Say that again?',
                'default_aiml_pattern' => 'RANDOM PICKUP LINE',
                'unknown_user' => 'Friend',
            ),
        ));
        
        
    }
}