<?php

use Illuminate\Database\Seeder;

class AimlUserdefinedTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('aiml_userdefined')->delete();
        
        \DB::table('aiml_userdefined')->insert(array (
            0 => 
            array (
                'id' => 1,
                'pattern' => 'WHAT COLOR IS  #',
                'thatpattern' => '',
                'template' => ' is .',
                'user_id' => '32',
                'bot_id' => 1,
                'date' => '2018-11-11 18:36:21',
            ),
        ));
        
        
    }
}