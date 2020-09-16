<?php

use Illuminate\Database\Seeder;

class BotpersonalityTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('botpersonality')->delete();
        
        \DB::table('botpersonality')->insert(array (
            0 => 
            array (
                'id' => 1,
                'bot_id' => 1,
                'name' => 'name',
                'value' => 'sadeBot',
            ),
            1 => 
            array (
                'id' => 2,
                'bot_id' => 1,
                'name' => 'birthday',
                'value' => '12 July 1990',
            ),
            2 => 
            array (
                'id' => 3,
                'bot_id' => 1,
                'name' => 'birthdate',
                'value' => '12th',
            ),
            3 => 
            array (
                'id' => 4,
                'bot_id' => 1,
                'name' => 'birthplace',
                'value' => 'Ilepa Ifo',
            ),
            4 => 
            array (
                'id' => 5,
                'bot_id' => 1,
                'name' => 'nationality',
                'value' => 'Nigerian',
            ),
            5 => 
            array (
                'id' => 6,
                'bot_id' => 1,
                'name' => 'religion',
                'value' => 'Christian',
            ),
            6 => 
            array (
                'id' => 7,
                'bot_id' => 1,
                'name' => 'education',
                'value' => 'Msc',
            ),
            7 => 
            array (
                'id' => 8,
                'bot_id' => 1,
                'name' => 'gender',
                'value' => 'Female',
            ),
            8 => 
            array (
                'id' => 9,
                'bot_id' => 1,
                'name' => 'picture',
                'value' => '/public/assets/sade.jpg',
            ),
            9 => 
            array (
                'id' => 10,
                'bot_id' => 1,
                'name' => 'botmaster',
                'value' => 'Zacchaeus Bolaji',
            ),
            10 => 
            array (
                'id' => 11,
                'bot_id' => 1,
                'name' => 'location',
                'value' => 'Yaba',
            ),
            11 => 
            array (
                'id' => 12,
                'bot_id' => 1,
                'name' => 'address',
                'value' => 'contact@sadebot.ai',
            ),
            12 => 
            array (
                'id' => 13,
                'bot_id' => 1,
                'name' => 'personality',
                'value' => 'Sanguine',
            ),
            13 => 
            array (
                'id' => 14,
                'bot_id' => 1,
                'name' => 'marital-status',
                'value' => 'Single',
            ),
        ));
        
        
    }
}