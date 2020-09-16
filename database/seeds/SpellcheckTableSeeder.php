<?php

use Illuminate\Database\Seeder;

class SpellcheckTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('spellcheck')->delete();
        
        \DB::table('spellcheck')->insert(array (
            0 => 
            array (
                'id' => 1,
                'missspelling' => 'shakespear',
                'correction' => 'shakespeare',
            ),
            1 => 
            array (
                'id' => 2,
                'missspelling' => 'shakesper',
                'correction' => 'shakespeare',
            ),
            2 => 
            array (
                'id' => 3,
                'missspelling' => 'ws',
                'correction' => 'william shakespeare',
            ),
            3 => 
            array (
                'id' => 4,
                'missspelling' => 'shakespaer',
                'correction' => 'shakespeare',
            ),
            4 => 
            array (
                'id' => 5,
                'missspelling' => 'shakespere',
                'correction' => 'shakespeare',
            ),
            5 => 
            array (
                'id' => 6,
                'missspelling' => 'shakepeare',
                'correction' => 'shakespeare',
            ),
            6 => 
            array (
                'id' => 7,
                'missspelling' => 'shakeper',
                'correction' => 'shakespeare',
            ),
            7 => 
            array (
                'id' => 8,
                'missspelling' => 'willam',
                'correction' => 'william',
            ),
            8 => 
            array (
                'id' => 9,
                'missspelling' => 'willaim',
                'correction' => 'william',
            ),
            9 => 
            array (
                'id' => 10,
                'missspelling' => 'romoe',
                'correction' => 'romeo',
            ),
            10 => 
            array (
                'id' => 11,
                'missspelling' => 'julet',
                'correction' => 'juliet',
            ),
            11 => 
            array (
                'id' => 12,
                'missspelling' => 'juleit',
                'correction' => 'juliet',
            ),
            12 => 
            array (
                'id' => 13,
                'missspelling' => 'thats',
                'correction' => 'that is',
            ),
            13 => 
            array (
                'id' => 89,
                'missspelling' => 'Youa aare',
                'correction' => 'you are',
            ),
            14 => 
            array (
                'id' => 88,
                'missspelling' => 'that s',
                'correction' => 'that is',
            ),
            15 => 
            array (
                'id' => 87,
                'missspelling' => 'wot s',
                'correction' => 'what is',
            ),
            16 => 
            array (
                'id' => 17,
                'missspelling' => 'whats',
                'correction' => 'what is',
            ),
            17 => 
            array (
                'id' => 18,
                'missspelling' => 'wot',
                'correction' => 'what',
            ),
            18 => 
            array (
                'id' => 19,
                'missspelling' => 'wots',
                'correction' => 'what is',
            ),
            19 => 
            array (
                'id' => 86,
                'missspelling' => 'what s',
                'correction' => 'what is',
            ),
            20 => 
            array (
                'id' => 21,
                'missspelling' => 'lool',
                'correction' => 'lol',
            ),
            21 => 
            array (
                'id' => 27,
                'missspelling' => 'pogram',
                'correction' => 'program',
            ),
            22 => 
            array (
                'id' => 23,
                'missspelling' => 'progam',
                'correction' => 'program',
            ),
            23 => 
            array (
                'id' => 26,
                'missspelling' => 'progam',
                'correction' => 'program',
            ),
            24 => 
            array (
                'id' => 28,
                'missspelling' => 'r',
                'correction' => 'are',
            ),
            25 => 
            array (
                'id' => 29,
                'missspelling' => 'u',
                'correction' => 'you',
            ),
            26 => 
            array (
                'id' => 30,
                'missspelling' => 'ur',
                'correction' => 'your',
            ),
            27 => 
            array (
                'id' => 31,
                'missspelling' => 'v',
                'correction' => 'very',
            ),
            28 => 
            array (
                'id' => 32,
                'missspelling' => 'k',
                'correction' => 'ok',
            ),
            29 => 
            array (
                'id' => 33,
                'missspelling' => 'np',
                'correction' => 'no problem',
            ),
            30 => 
            array (
                'id' => 34,
                'missspelling' => 'ta',
                'correction' => 'thank you',
            ),
            31 => 
            array (
                'id' => 35,
                'missspelling' => 'ty',
                'correction' => 'thank you',
            ),
            32 => 
            array (
                'id' => 36,
                'missspelling' => 'omg',
                'correction' => 'oh my god',
            ),
            33 => 
            array (
                'id' => 37,
                'missspelling' => 'letts',
                'correction' => 'lets',
            ),
            34 => 
            array (
                'id' => 38,
                'missspelling' => 'yeah',
                'correction' => 'yes',
            ),
            35 => 
            array (
                'id' => 39,
                'missspelling' => 'yeh',
                'correction' => 'yes',
            ),
            36 => 
            array (
                'id' => 40,
                'missspelling' => 'portugues',
                'correction' => 'portuguese',
            ),
            37 => 
            array (
                'id' => 41,
                'missspelling' => 'hehe',
                'correction' => 'lol',
            ),
            38 => 
            array (
                'id' => 42,
                'missspelling' => 'ha',
                'correction' => 'lol',
            ),
            39 => 
            array (
                'id' => 43,
                'missspelling' => 'intersting',
                'correction' => 'interesting',
            ),
            40 => 
            array (
                'id' => 44,
                'missspelling' => 'qestion',
                'correction' => 'question',
            ),
            41 => 
            array (
                'id' => 45,
                'missspelling' => 'elrond hubbard',
                'correction' => 'l.ron hubbard',
            ),
            42 => 
            array (
                'id' => 46,
                'missspelling' => 'programm',
                'correction' => 'program',
            ),
            43 => 
            array (
                'id' => 47,
                'missspelling' => 'c\'mon',
                'correction' => 'come on',
            ),
            44 => 
            array (
                'id' => 48,
                'missspelling' => 'ye',
                'correction' => 'yes',
            ),
            45 => 
            array (
                'id' => 49,
                'missspelling' => 'im',
                'correction' => 'i am',
            ),
            46 => 
            array (
                'id' => 50,
                'missspelling' => 'fuckahh',
                'correction' => 'fucker',
            ),
            47 => 
            array (
                'id' => 51,
                'missspelling' => 'shakespeare bot',
                'correction' => 'shakespearebot',
            ),
            48 => 
            array (
                'id' => 52,
                'missspelling' => 'goodf',
                'correction' => 'good',
            ),
            49 => 
            array (
                'id' => 53,
                'missspelling' => 'dont',
                'correction' => 'do not',
            ),
            50 => 
            array (
                'id' => 54,
                'missspelling' => 'cos',
                'correction' => 'because',
            ),
            51 => 
            array (
                'id' => 55,
                'missspelling' => 'cus',
                'correction' => 'because',
            ),
            52 => 
            array (
                'id' => 56,
                'missspelling' => 'coz',
                'correction' => 'because',
            ),
            53 => 
            array (
                'id' => 57,
                'missspelling' => 'cuz',
                'correction' => 'because',
            ),
            54 => 
            array (
                'id' => 58,
                'missspelling' => 'isnt',
                'correction' => 'is not',
            ),
            55 => 
            array (
                'id' => 59,
                'missspelling' => 'isn\'t',
                'correction' => 'is not',
            ),
            56 => 
            array (
                'id' => 60,
                'missspelling' => 'i\'m',
                'correction' => 'i am',
            ),
            57 => 
            array (
                'id' => 61,
                'missspelling' => 'ima',
                'correction' => 'i am a',
            ),
            58 => 
            array (
                'id' => 62,
                'missspelling' => 'chheese',
                'correction' => 'cheese',
            ),
            59 => 
            array (
                'id' => 63,
                'missspelling' => 'watsup',
                'correction' => 'what is up',
            ),
            60 => 
            array (
                'id' => 64,
                'missspelling' => 'let s',
                'correction' => 'let us',
            ),
            61 => 
            array (
                'id' => 65,
                'missspelling' => 'he s',
                'correction' => 'he is',
            ),
            62 => 
            array (
                'id' => 66,
                'missspelling' => 'she\'s',
                'correction' => 'she is',
            ),
            63 => 
            array (
                'id' => 67,
                'missspelling' => 'i ll',
                'correction' => 'i will',
            ),
            64 => 
            array (
                'id' => 68,
                'missspelling' => 'they ll',
                'correction' => 'they will',
            ),
            65 => 
            array (
                'id' => 69,
                'missspelling' => 'you re',
                'correction' => 'you are',
            ),
            66 => 
            array (
                'id' => 70,
                'missspelling' => 'you ve',
                'correction' => 'you have',
            ),
            67 => 
            array (
                'id' => 71,
                'missspelling' => 'hy',
                'correction' => 'hey',
            ),
            68 => 
            array (
                'id' => 72,
                'missspelling' => 'msician',
                'correction' => 'musician',
            ),
            69 => 
            array (
                'id' => 74,
                'missspelling' => 'don t',
                'correction' => 'do not',
            ),
            70 => 
            array (
                'id' => 75,
                'missspelling' => 'can t',
                'correction' => 'cannot',
            ),
            71 => 
            array (
                'id' => 76,
                'missspelling' => 'favourite',
                'correction' => 'favorite',
            ),
            72 => 
            array (
                'id' => 77,
                'missspelling' => 'colour',
                'correction' => 'color',
            ),
            73 => 
            array (
                'id' => 78,
                'missspelling' => 'won t',
                'correction' => 'will not',
            ),
            74 => 
            array (
                'id' => 79,
                'missspelling' => 'a/s/l',
                'correction' => 'asl',
            ),
            75 => 
            array (
                'id' => 80,
                'missspelling' => 'haven t',
                'correction' => 'have not',
            ),
            76 => 
            array (
                'id' => 81,
                'missspelling' => 'doesn t',
                'correction' => 'does not',
            ),
            77 => 
            array (
                'id' => 82,
                'missspelling' => 'a/s/l/',
                'correction' => 'asl',
            ),
            78 => 
            array (
                'id' => 83,
                'missspelling' => 'wht',
                'correction' => 'what',
            ),
            79 => 
            array (
                'id' => 84,
                'missspelling' => 'It s been',
                'correction' => 'It has been',
            ),
            80 => 
            array (
                'id' => 85,
                'missspelling' => 'its been',
                'correction' => 'it has been',
            ),
            81 => 
            array (
                'id' => 90,
                'missspelling' => 'you re',
                'correction' => 'you are',
            ),
            82 => 
            array (
                'id' => 91,
                'missspelling' => 'theres',
                'correction' => 'there is',
            ),
            83 => 
            array (
                'id' => 92,
                'missspelling' => 'youa re',
                'correction' => 'you are',
            ),
            84 => 
            array (
                'id' => 93,
                'missspelling' => 'youa aare',
                'correction' => 'you are',
            ),
            85 => 
            array (
                'id' => 94,
                'missspelling' => 'wath',
                'correction' => 'what',
            ),
            86 => 
            array (
                'id' => 95,
                'missspelling' => 'waths',
                'correction' => 'what is',
            ),
            87 => 
            array (
                'id' => 96,
                'missspelling' => 'hy',
                'correction' => 'hey',
            ),
            88 => 
            array (
                'id' => 97,
                'missspelling' => 'oke',
                'correction' => 'ok',
            ),
            89 => 
            array (
                'id' => 98,
                'missspelling' => 'okay',
                'correction' => 'ok',
            ),
            90 => 
            array (
                'id' => 99,
                'missspelling' => 'errm',
                'correction' => 'erm',
            ),
            91 => 
            array (
                'id' => 100,
                'missspelling' => 'aare',
                'correction' => 'are',
            ),
            92 => 
            array (
                'id' => 101,
                'missspelling' => 'shakespeare bot',
                'correction' => 'william shakespeare',
            ),
            93 => 
            array (
                'id' => 102,
                'missspelling' => 'shakespearebot',
                'correction' => 'william shakespeare',
            ),
            94 => 
            array (
                'id' => 103,
                'missspelling' => 'werwerwer',
                'correction' => 'war',
            ),
            95 => 
            array (
                'id' => 109,
                'missspelling' => 'program o',
                'correction' => 'programo',
            ),
            96 => 
            array (
                'id' => 106,
                'missspelling' => 'ddddddddd',
                'correction' => 'ddddddddd',
            ),
            97 => 
            array (
                'id' => 107,
                'missspelling' => 'ddddddddd',
                'correction' => 'ddddddddd',
            ),
            98 => 
            array (
                'id' => 108,
                'missspelling' => 'fgfgfgfg',
                'correction' => 'fgfgfgfg',
            ),
            99 => 
            array (
                'id' => 110,
                'missspelling' => 'program-o',
                'correction' => 'programo',
            ),
            100 => 
            array (
                'id' => 111,
                'missspelling' => 'fav',
                'correction' => 'favorite',
            ),
            101 => 
            array (
                'id' => 112,
                'missspelling' => 'FUCK',
                'correction' => 'FUCK',
            ),
            102 => 
            array (
                'id' => 113,
                'missspelling' => 'U',
                'correction' => 'YOU',
            ),
        ));
        
        
    }
}