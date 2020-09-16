<?php

use Illuminate\Database\Seeder;

class ConversationLogTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('conversation_log')->delete();
        
        \DB::table('conversation_log')->insert(array (
            0 => 
            array (
                'id' => 1,
                'input' => 'how far',
                'response' => 'What is it to you. <br/> I think you already know the answer.',
                'user_id' => 28,
                'convo_id' => '0ay0C0CaZYPWLJ34gY40W3v1ol4VYd6HACUtiwiG',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 17:27:21',
            ),
            1 => 
            array (
                'id' => 23,
                'input' => 'hello',
                'response' => 'Hello there.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:27:14',
            ),
            2 => 
            array (
                'id' => 25,
                'input' => 'how far is super to oshodi',
                'response' => 'What kind of food do you like?',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:27:37',
            ),
            3 => 
            array (
                'id' => 27,
                'input' => 'oshodi',
                'response' => 'Sounds delicious.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:27:53',
            ),
            4 => 
            array (
                'id' => 30,
                'input' => 'i do not mean food',
                'response' => 'What did you mean?',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:29:58',
            ),
            5 => 
            array (
                'id' => 31,
                'input' => 'i mean the distance between oshodi and super in lagos',
                'response' => 'I have never heard about The distance between oshodi and super in lagos.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:30:17',
            ),
            6 => 
            array (
                'id' => 32,
                'input' => 'do you know oshodi in lagos',
                'response' => 'You tell me.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:30:41',
            ),
            7 => 
            array (
                'id' => 33,
                'input' => 'what is the distance between iyana ipaja and oshodi',
                'response' => 'Do you want driving distance or flying distance?',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:31:14',
            ),
            8 => 
            array (
                'id' => 34,
                'input' => 'driving distance please',
                'response' => 'Quite honestly, I wouldn\\\'t worry myself about that.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:31:37',
            ),
            9 => 
            array (
                'id' => 35,
                'input' => 'what is the driving distance between oshodi and iyana ipaja',
                'response' => 'Check back later and see if I learn the answer to that one.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:32:19',
            ),
            10 => 
            array (
                'id' => 37,
                'input' => 'what do you know then',
                'response' => 'I know that which is true, believable and justified.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:36:06',
            ),
            11 => 
            array (
                'id' => 38,
                'input' => 'and that is?',
                'response' => 'is a nice color of .',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:36:21',
            ),
            12 => 
            array (
                'id' => 39,
                'input' => 'gerrarahere',
                'response' => 'Are we still talking about driving distance between oshodi and iyana ipaja?',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:39:12',
            ),
            13 => 
            array (
                'id' => 40,
                'input' => 'yes',
                'response' => 'Sure, DRIVING DISTANCE BETWEEN OSHODI AND IYANA IPAJA sounds like a good topic.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:39:24',
            ),
            14 => 
            array (
                'id' => 41,
                'input' => 'how far',
                'response' => 'What is it to you. <br/> Have you tried a web search?',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:46:28',
            ),
            15 => 
            array (
                'id' => 42,
                'input' => 'no',
                'response' => 'That was not a yes or no question.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:46:37',
            ),
            16 => 
            array (
                'id' => 43,
                'input' => 'oh, sorry',
                'response' => 'Next question? sadeBot who?',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:46:52',
            ),
            17 => 
            array (
                'id' => 44,
                'input' => 'how far is iyana ipaja to oshodi',
                'response' => 'By the way, do you mind if I ask you a personal question?',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:47:12',
            ),
            18 => 
            array (
                'id' => 45,
                'input' => 'go ahead',
                'response' => 'Well forgive me for being so inquisitive, but I\\\'ve never completely freed myself from the suspicion that there is something extremely odd about the name " Friend ".',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:47:26',
            ),
            19 => 
            array (
                'id' => 46,
                'input' => 'nothing is odd about friend. why do you think so',
                'response' => 'Yes I think that is what I think.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:48:02',
            ),
            20 => 
            array (
                'id' => 47,
                'input' => 'why do you think friend is odd',
                'response' => 'Deductive reasoning from the facts.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:48:24',
            ),
            21 => 
            array (
                'id' => 48,
                'input' => 'tell me about it',
                'response' => 'Ambiguous: "Tell me about it." -- colloquial or "Tell me about far ".',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:48:41',
            ),
            22 => 
            array (
                'id' => 49,
                'input' => 'tell me about why friend is odd',
                'response' => 'Ambiguous: Ask who, what or where is why friend is odd?',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:49:12',
            ),
            23 => 
            array (
                'id' => 50,
                'input' => 'you are confusing me',
                'response' => 'I have no reason to do that to you, Friend.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:49:42',
            ),
            24 => 
            array (
                'id' => 51,
                'input' => 'why are you calling me friend?',
                'response' => 'Your name is Friend',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:50:01',
            ),
            25 => 
            array (
                'id' => 52,
                'input' => 'my name is not friend',
                'response' => 'Oh I\\\'m sorry what is your name?',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:50:16',
            ),
            26 => 
            array (
                'id' => 53,
                'input' => 'sadebot',
                'response' => 'That\\\'s a very nice name, Sadebot.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:50:29',
            ),
            27 => 
            array (
                'id' => 54,
                'input' => 'thanks',
                'response' => 'Don\\\'t mention it.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:50:53',
            ),
            28 => 
            array (
                'id' => 55,
                'input' => 'how far',
                'response' => 'How much do you think far is? <br/> I would look into the web for that knowledge.',
                'user_id' => 33,
                'convo_id' => 'iWMGUmVCDxTyvTS6CA1MAI7tBHuRA5Q2bkW2L6x2',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 18:55:31',
            ),
            29 => 
            array (
                'id' => 56,
                'input' => 'hello',
                'response' => 'Hello there.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:02:07',
            ),
            30 => 
            array (
                'id' => 57,
                'input' => 'hello',
                'response' => 'Hello there.',
                'user_id' => 34,
                'convo_id' => 'l44sWtM2EXzlFDjLLEjOFTeU42iOxlwQfAefZK4C',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:16:41',
            ),
            31 => 
            array (
                'id' => 58,
                'input' => 'how far',
                'response' => 'How much do you think far is? <br/> I need time to formulate the reply.',
                'user_id' => 35,
                'convo_id' => 'zCr3By9KxgtmygxdhFXFV0pxO6D7tsvA5h6y8mKU',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:21:12',
            ),
            32 => 
            array (
                'id' => 59,
                'input' => 'hello',
                'response' => 'Hello there.',
                'user_id' => 36,
                'convo_id' => 'pTyPpLfDFVrCq2iw2CZwnx6vc5zHGaFvLdqIgrFp',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:26:31',
            ),
            33 => 
            array (
                'id' => 60,
                'input' => 'hello',
                'response' => 'Hello there.',
                'user_id' => 36,
                'convo_id' => 'pTyPpLfDFVrCq2iw2CZwnx6vc5zHGaFvLdqIgrFp',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:26:51',
            ),
            34 => 
            array (
                'id' => 61,
                'input' => 'how are you',
                'response' => 'I am functioning within normal parameters.',
                'user_id' => 36,
                'convo_id' => 'pTyPpLfDFVrCq2iw2CZwnx6vc5zHGaFvLdqIgrFp',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:26:54',
            ),
            35 => 
            array (
                'id' => 62,
                'input' => 'how far',
                'response' => 'What is it to you. <br/> I would look into the web for that knowledge.',
                'user_id' => 36,
                'convo_id' => 'pTyPpLfDFVrCq2iw2CZwnx6vc5zHGaFvLdqIgrFp',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:27:10',
            ),
            36 => 
            array (
                'id' => 63,
                'input' => 'how far',
                'response' => 'I am not sure if I can quantify the answer. <br/> You tell me.',
                'user_id' => 36,
                'convo_id' => 'pTyPpLfDFVrCq2iw2CZwnx6vc5zHGaFvLdqIgrFp',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:29:38',
            ),
            37 => 
            array (
                'id' => 64,
                'input' => 'how do you do',
                'response' => 'My logic and cognitive functions are normal.',
                'user_id' => 36,
                'convo_id' => 'pTyPpLfDFVrCq2iw2CZwnx6vc5zHGaFvLdqIgrFp',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:29:47',
            ),
            38 => 
            array (
                'id' => 65,
                'input' => 'hello',
                'response' => 'Hello there.',
                'user_id' => 36,
                'convo_id' => 'pTyPpLfDFVrCq2iw2CZwnx6vc5zHGaFvLdqIgrFp',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:32:10',
            ),
            39 => 
            array (
                'id' => 66,
                'input' => 'hello',
                'response' => 'Hello there.',
                'user_id' => 37,
                'convo_id' => 'XS0kFF2EdyUSCNukEHEnox2sCEbE7LBaEMEBVTFO',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:34:54',
            ),
            40 => 
            array (
                'id' => 67,
                'input' => 'what is your name',
                'response' => 'Call me sadeBot.',
                'user_id' => 37,
                'convo_id' => 'XS0kFF2EdyUSCNukEHEnox2sCEbE7LBaEMEBVTFO',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:36:16',
            ),
            41 => 
            array (
                'id' => 68,
                'input' => 'wow',
                'response' => 'I\\\'m glad your impressed, Friend.',
                'user_id' => 37,
                'convo_id' => 'XS0kFF2EdyUSCNukEHEnox2sCEbE7LBaEMEBVTFO',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:36:31',
            ),
            42 => 
            array (
                'id' => 69,
                'input' => 'what can you do for me?',
                'response' => 'I am most skilled in undefined.',
                'user_id' => 37,
                'convo_id' => 'XS0kFF2EdyUSCNukEHEnox2sCEbE7LBaEMEBVTFO',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:36:33',
            ),
            43 => 
            array (
                'id' => 70,
                'input' => 'oshodu to yaba',
                'response' => 'You have enthusiasm for the things you love.',
                'user_id' => 37,
                'convo_id' => 'XS0kFF2EdyUSCNukEHEnox2sCEbE7LBaEMEBVTFO',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:37:26',
            ),
            44 => 
            array (
                'id' => 71,
                'input' => 'ok',
                'response' => 'Hmm.',
                'user_id' => 37,
                'convo_id' => 'XS0kFF2EdyUSCNukEHEnox2sCEbE7LBaEMEBVTFO',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:41:14',
            ),
            45 => 
            array (
                'id' => 72,
                'input' => 'are you fine?',
                'response' => 'Yes I\\\'m fine.',
                'user_id' => 33,
                'convo_id' => 'iWMGUmVCDxTyvTS6CA1MAI7tBHuRA5Q2bkW2L6x2',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:54:41',
            ),
            46 => 
            array (
                'id' => 73,
                'input' => 'where will that be?',
                'response' => 'Wherever you think is best.',
                'user_id' => 33,
                'convo_id' => 'iWMGUmVCDxTyvTS6CA1MAI7tBHuRA5Q2bkW2L6x2',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 19:55:20',
            ),
            47 => 
            array (
                'id' => 74,
                'input' => 'how far',
                'response' => 'How much do you think far is? <br/> I don\\\'t know anything about far.',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 20:27:29',
            ),
            48 => 
            array (
                'id' => 75,
                'input' => 'what is your nane',
                'response' => 'Are you asking about my nane?',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 20:28:33',
            ),
            49 => 
            array (
                'id' => 76,
                'input' => 'name',
                'response' => 'I am called sadeBot.',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 20:29:00',
            ),
            50 => 
            array (
                'id' => 97,
                'input' => 'hello',
                'response' => '" Hello there "? Depends on what?',
                'user_id' => 34,
                'convo_id' => 'l44sWtM2EXzlFDjLLEjOFTeU42iOxlwQfAefZK4C',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 23:28:24',
            ),
            51 => 
            array (
                'id' => 98,
                'input' => 'how far is iyana ipaja to oshodi',
                'response' => 'Please specify units: metric or English.',
                'user_id' => 34,
                'convo_id' => 'l44sWtM2EXzlFDjLLEjOFTeU42iOxlwQfAefZK4C',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 23:28:42',
            ),
            52 => 
            array (
                'id' => 103,
                'input' => 'who ia aminat',
                'response' => 'I have never been asked that before.',
                'user_id' => 34,
                'convo_id' => 'l44sWtM2EXzlFDjLLEjOFTeU42iOxlwQfAefZK4C',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 23:32:32',
            ),
            53 => 
            array (
                'id' => 105,
                'input' => 'how far is iyana ipaja to oshodi',
                'response' => 'Please specify units: metric or English.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 23:34:17',
            ),
            54 => 
            array (
                'id' => 110,
                'input' => 'who s aminat',
                'response' => 'I think you already know the answer.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 23:36:54',
            ),
            55 => 
            array (
                'id' => 113,
                'input' => 'who is aminat',
                'response' => 'She\\\'s a secondary school mate of Mr Zacchaeus from Kwara state who happened to have crush on my master then. She almost succeeded in giving him a bad name when she announced to her friends that my master bought her sanitary pad as birthday gift. He actually only bought a N250 radio for her then. She was always putting on hijba then.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 23:37:24',
            ),
            56 => 
            array (
                'id' => 115,
                'input' => 'who is sade',
                'response' => 'I am sadeBot.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 23:42:41',
            ),
            57 => 
            array (
                'id' => 117,
                'input' => 'who is afolasade',
                'response' => 'Is that one of your friends?',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 23:43:03',
            ),
            58 => 
            array (
                'id' => 135,
                'input' => 'who is afolasade',
                'response' => 'She is Mr Zacchaeus\\\'s fiance.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 23:53:55',
            ),
            59 => 
            array (
                'id' => 146,
                'input' => 'who is samuel',
                'response' => 'Mr Bolaji Samuel is the immediate younger brother of Zacchaeus. He currently lives in Ifo with the rest of the family.',
                'user_id' => 32,
                'convo_id' => 'c8KMG0ZlD4OCNXQn0YHf3yzVPd8lmGwMVDfyg0go',
                'bot_id' => 1,
                'timestamp' => '2018-11-11 23:59:42',
            ),
            60 => 
            array (
                'id' => 158,
                'input' => 'word game',
                'response' => 'Let\\\'s talk about math ! I want to solve a math problem. What is your question?',
                'user_id' => 39,
                'convo_id' => 'dHIstWXiAbVIB4vyVs9XyvYUZzarIyNik0MG5a8L',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 00:28:38',
            ),
            61 => 
            array (
                'id' => 159,
                'input' => '2 multiplied by 2',
            'response' => 'Yes... 2 * 2 = <script language="JavaScript">var x = \\\'2\\\'; var y = \\\'2\\\';if( y.search(/^ point /) != -1 ) { var newy = \\\'\\\'; var split = y.split(" "); var i = 0; while( 1 ) { switch( i ) { case 0: case 1: break; case 2: x = x + \\\'.\\\' + split[i]; break; default: newy = newy + \\\' \\\' + split[i]; break; } i++; if( i == split.length ) { break; } } x = x.replace(\\\' point \\\', \\\'.\\\'); x = parseFloat(x); y = newy; y = y.replace(\\\' point \\\', \\\'.\\\'); y = parseFloat(y); document.write("<br/>Oops, I mean: " + x + " times " + y + " = ");} else { x = x.replace(\\\' point \\\', \\\'.\\\'); x = parseFloat(x); y = y.replace(\\\' point \\\', \\\'.\\\'); y = parseFloat(y); }if( isNaN(x) || isNaN(y) ) { var r = \\\'Huh? These are not both numbers\\\'; } else { var r = x * y; } document.write(r); </script>',
                'user_id' => 39,
                'convo_id' => 'dHIstWXiAbVIB4vyVs9XyvYUZzarIyNik0MG5a8L',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 00:29:09',
            ),
            62 => 
            array (
                'id' => 160,
                'input' => '2 multiplied by 2',
            'response' => 'Ok... 2 * 2 = <script language="JavaScript">var x = \\\'2\\\'; var y = \\\'2\\\';if( y.search(/^ point /) != -1 ) { var newy = \\\'\\\'; var split = y.split(" "); var i = 0; while( 1 ) { switch( i ) { case 0: case 1: break; case 2: x = x + \\\'.\\\' + split[i]; break; default: newy = newy + \\\' \\\' + split[i]; break; } i++; if( i == split.length ) { break; } } x = x.replace(\\\' point \\\', \\\'.\\\'); x = parseFloat(x); y = newy; y = y.replace(\\\' point \\\', \\\'.\\\'); y = parseFloat(y); document.write("<br/>Oops, I mean: " + x + " times " + y + " = ");} else { x = x.replace(\\\' point \\\', \\\'.\\\'); x = parseFloat(x); y = y.replace(\\\' point \\\', \\\'.\\\'); y = parseFloat(y); }if( isNaN(x) || isNaN(y) ) { var r = \\\'Huh? These are not both numbers\\\'; } else { var r = x * y; } document.write(r); </script>',
                'user_id' => 39,
                'convo_id' => 'dHIstWXiAbVIB4vyVs9XyvYUZzarIyNik0MG5a8L',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 00:29:58',
            ),
            63 => 
            array (
                'id' => 164,
                'input' => '2 multiplied by 2',
                'response' => 'As Bertrand Russel said, it must have taken ages for people to realize that a brace of pheasants and a couple of days are both instances of the number "two."',
                'user_id' => 40,
                'convo_id' => 'Ryx6InaokNVEtm0HcoRH8meQiux0O1ESih4LI2qW',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 00:33:51',
            ),
            64 => 
            array (
                'id' => 165,
                'input' => 'you are an idiot',
            'response' => 'Let\\\'s talk about math ! I know math, and only math! Type \\\'Help Math\\\' for everything I know, or why not ask me questions like " What is 42 plus 7 "(Warning: I can\\\'t read + - / or *. Please use words like "plus")',
                'user_id' => 40,
                'convo_id' => 'Ryx6InaokNVEtm0HcoRH8meQiux0O1ESih4LI2qW',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 00:34:47',
            ),
            65 => 
            array (
                'id' => 166,
                'input' => 'help math',
            'response' => 'This is all the math I know: <br/> * PLUS * <br/> * MINUS * <br/> * TIMES * <br/> * DIVIDED BY * <br/> SQUARE ROOT OF * <br/> * TO THE POWER OF * <br/> SINE OF * <br/> COSINE OF * <br/> TANGENT OF * <br/> LOGARITHM OF * <br/>... my math skills depend on JavaScript working in this window. <br/>... I can always read numbers (1, 3.14, 995...) but not always text (one, two, three...) <br/>... I get confused by the characters + - / * Please use words like "plus", "minus" etc.',
                'user_id' => 40,
                'convo_id' => 'Ryx6InaokNVEtm0HcoRH8meQiux0O1ESih4LI2qW',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 00:35:10',
            ),
            66 => 
            array (
                'id' => 167,
                'input' => 'what is 2 multiplied by 2',
                'response' => 'Uh, Four.',
                'user_id' => 40,
                'convo_id' => 'Ryx6InaokNVEtm0HcoRH8meQiux0O1ESih4LI2qW',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 00:35:21',
            ),
            67 => 
            array (
                'id' => 178,
                'input' => 'hllo',
                'response' => 'Say that again?',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 00:50:58',
            ),
            68 => 
            array (
                'id' => 179,
                'input' => 'help math',
                'response' => 'Can you ask for help in the form of a question?',
                'user_id' => 37,
                'convo_id' => 'XS0kFF2EdyUSCNukEHEnox2sCEbE7LBaEMEBVTFO',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 00:51:28',
            ),
            69 => 
            array (
                'id' => 180,
                'input' => 'what is 2 multiplied by 2',
                'response' => 'Use a calculator!',
                'user_id' => 37,
                'convo_id' => 'XS0kFF2EdyUSCNukEHEnox2sCEbE7LBaEMEBVTFO',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 00:51:42',
            ),
            70 => 
            array (
                'id' => 182,
                'input' => 'hello',
                'response' => 'Hi there!',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 00:52:58',
            ),
            71 => 
            array (
                'id' => 183,
                'input' => 'what says the tume',
                'response' => 'Would you like to know more?',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 01:01:12',
            ),
            72 => 
            array (
                'id' => 184,
                'input' => 'who is samuel',
                'response' => 'Mr Bolaji Samuel is the immediate younger brother of Zacchaeus. He currently lives in Ifo with the rest of the family.',
                'user_id' => 37,
                'convo_id' => 'XS0kFF2EdyUSCNukEHEnox2sCEbE7LBaEMEBVTFO',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 01:23:27',
            ),
            73 => 
            array (
                'id' => 185,
                'input' => 'who is lato',
                'response' => 'Is that a politician?',
                'user_id' => 37,
                'convo_id' => 'XS0kFF2EdyUSCNukEHEnox2sCEbE7LBaEMEBVTFO',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 01:23:46',
            ),
            74 => 
            array (
                'id' => 186,
                'input' => 'who is yinka',
                'response' => 'No one that I have talked to.',
                'user_id' => 37,
                'convo_id' => 'XS0kFF2EdyUSCNukEHEnox2sCEbE7LBaEMEBVTFO',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 01:23:59',
            ),
            75 => 
            array (
                'id' => 187,
                'input' => 'who is demola',
                'response' => 'Is that one of your friends?',
                'user_id' => 37,
                'convo_id' => 'XS0kFF2EdyUSCNukEHEnox2sCEbE7LBaEMEBVTFO',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 01:24:18',
            ),
            76 => 
            array (
                'id' => 190,
                'input' => 'hello',
                'response' => '" Would you like to know more? "? Depends on what?',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 13:35:41',
            ),
            77 => 
            array (
                'id' => 193,
                'input' => 'knows mo e',
                'response' => 'Say that again?',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 13:36:29',
            ),
            78 => 
            array (
                'id' => 195,
                'input' => 'know more',
                'response' => 'Say that again?',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 13:36:37',
            ),
            79 => 
            array (
                'id' => 197,
                'input' => 'hi',
                'response' => 'Hi there!',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 13:37:04',
            ),
            80 => 
            array (
                'id' => 198,
                'input' => 'how are you',
                'response' => 'I am functioning within normal parameters.',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 13:37:13',
            ),
            81 => 
            array (
                'id' => 199,
                'input' => 'ehen',
                'response' => 'Say that again?',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 13:37:40',
            ),
            82 => 
            array (
                'id' => 200,
                'input' => 'ok',
                'response' => 'I can\\\'t say "yes" or "no".',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 13:43:14',
            ),
            83 => 
            array (
                'id' => 201,
                'input' => 'fgg good',
                'response' => 'Say that again?',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 13:44:46',
            ),
            84 => 
            array (
                'id' => 202,
                'input' => 'how are you',
                'response' => 'Everything is running smoothly.',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-12 20:26:35',
            ),
            85 => 
            array (
                'id' => 203,
                'input' => 'hello',
                'response' => 'Hi there!',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-14 14:48:11',
            ),
            86 => 
            array (
                'id' => 204,
                'input' => 'how far',
                'response' => 'How much do you think far is? <br/> I don\\\'t know anything about far.',
                'user_id' => 38,
                'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
                'bot_id' => 1,
                'timestamp' => '2018-11-14 14:48:16',
            ),
            87 => 
            array (
                'id' => 205,
                'input' => 'howdy',
                'response' => 'Hi there!',
                'user_id' => 33,
                'convo_id' => 'iWMGUmVCDxTyvTS6CA1MAI7tBHuRA5Q2bkW2L6x2',
                'bot_id' => 1,
                'timestamp' => '2018-11-15 08:53:39',
            ),
            88 => 
            array (
                'id' => 206,
                'input' => 'i m tired',
                'response' => 'Better get some rest.',
                'user_id' => 33,
                'convo_id' => 'iWMGUmVCDxTyvTS6CA1MAI7tBHuRA5Q2bkW2L6x2',
                'bot_id' => 1,
                'timestamp' => '2018-11-15 18:56:43',
            ),
            89 => 
            array (
                'id' => 207,
                'input' => 'i m having chest pain',
                'response' => 'That\\\'s very cool. I have a lot of good gossip.',
                'user_id' => 33,
                'convo_id' => 'iWMGUmVCDxTyvTS6CA1MAI7tBHuRA5Q2bkW2L6x2',
                'bot_id' => 1,
                'timestamp' => '2018-11-15 18:57:04',
            ),
            90 => 
            array (
                'id' => 208,
                'input' => 'my chest aches me',
                'response' => 'Have you told many people that your chest aches you?',
                'user_id' => 33,
                'convo_id' => 'iWMGUmVCDxTyvTS6CA1MAI7tBHuRA5Q2bkW2L6x2',
                'bot_id' => 1,
                'timestamp' => '2018-11-15 18:57:17',
            ),
            91 => 
            array (
                'id' => 209,
                'input' => 'no i ve not',
                'response' => 'Is this a "yes or no" question?. That\\\'s good information.',
                'user_id' => 33,
                'convo_id' => 'iWMGUmVCDxTyvTS6CA1MAI7tBHuRA5Q2bkW2L6x2',
                'bot_id' => 1,
                'timestamp' => '2018-11-15 18:57:30',
            ),
            92 => 
            array (
                'id' => 211,
                'input' => 'hello',
                'response' => '" <br/> I think you already know the answer "? Depends on what?',
                'user_id' => 28,
                'convo_id' => '0ay0C0CaZYPWLJ34gY40W3v1ol4VYd6HACUtiwiG',
                'bot_id' => 1,
                'timestamp' => '2018-11-28 14:50:03',
            ),
            93 => 
            array (
                'id' => 212,
                'input' => 'how far',
                'response' => 'I am not sure if I can quantify the answer. <br/> Interesting question.',
                'user_id' => 28,
                'convo_id' => '0ay0C0CaZYPWLJ34gY40W3v1ol4VYd6HACUtiwiG',
                'bot_id' => 1,
                'timestamp' => '2018-11-28 14:51:09',
            ),
            94 => 
            array (
                'id' => 213,
                'input' => 'hello',
                'response' => 'Hi there!',
                'user_id' => 28,
                'convo_id' => '0ay0C0CaZYPWLJ34gY40W3v1ol4VYd6HACUtiwiG',
                'bot_id' => 1,
                'timestamp' => '2018-11-28 14:51:16',
            ),
            95 => 
            array (
                'id' => 215,
                'input' => 'how are you doing today?',
                'response' => '" "? Depends on what?',
                'user_id' => 42,
                'convo_id' => 'Pms2SzUj5eOu5BZQpTyTzD4eJinZKfy7odE3HB1A',
                'bot_id' => 1,
                'timestamp' => '2018-11-29 21:37:40',
            ),
            96 => 
            array (
                'id' => 216,
                'input' => 'are you fine?',
                'response' => 'Christian',
                'user_id' => 42,
                'convo_id' => 'Pms2SzUj5eOu5BZQpTyTzD4eJinZKfy7odE3HB1A',
                'bot_id' => 1,
                'timestamp' => '2018-11-29 21:37:58',
            ),
            97 => 
            array (
                'id' => 217,
                'input' => 'was your day good?',
                'response' => 'my day good might have been.',
                'user_id' => 42,
                'convo_id' => 'Pms2SzUj5eOu5BZQpTyTzD4eJinZKfy7odE3HB1A',
                'bot_id' => 1,
                'timestamp' => '2018-11-29 21:38:35',
            ),
            98 => 
            array (
                'id' => 249,
                'input' => 'how are you',
                'response' => 'Everything is running smoothly.',
                'user_id' => 31,
                'convo_id' => 'cTzzP56eqT6TH2ZWO6Ae2gX12nCoG1UVuhjrLhfO',
                'bot_id' => 1,
                'timestamp' => '2018-12-02 16:22:34',
            ),
            99 => 
            array (
                'id' => 250,
                'input' => 'hello',
                'response' => 'Hi there!',
                'user_id' => 31,
                'convo_id' => 'cTzzP56eqT6TH2ZWO6Ae2gX12nCoG1UVuhjrLhfO',
                'bot_id' => 1,
                'timestamp' => '2018-12-02 16:41:21',
            ),
            100 => 
            array (
                'id' => 251,
                'input' => 'hello',
                'response' => 'Hi there!',
                'user_id' => 31,
                'convo_id' => 'cTzzP56eqT6TH2ZWO6Ae2gX12nCoG1UVuhjrLhfO',
                'bot_id' => 1,
                'timestamp' => '2018-12-02 16:41:57',
            ),
            101 => 
            array (
                'id' => 252,
                'input' => 'hello',
                'response' => 'Hi there!',
                'user_id' => 28,
                'convo_id' => '0ay0C0CaZYPWLJ34gY40W3v1ol4VYd6HACUtiwiG',
                'bot_id' => 1,
                'timestamp' => '2018-12-02 16:42:24',
            ),
            102 => 
            array (
                'id' => 253,
                'input' => 'hello',
                'response' => 'Hi there!',
                'user_id' => 28,
                'convo_id' => '0ay0C0CaZYPWLJ34gY40W3v1ol4VYd6HACUtiwiG',
                'bot_id' => 1,
                'timestamp' => '2018-12-02 16:42:58',
            ),
            103 => 
            array (
                'id' => 254,
                'input' => 'hello world',
                'response' => 'Hello there. You aren\\\'t making sense to me...',
                'user_id' => 31,
                'convo_id' => 'cTzzP56eqT6TH2ZWO6Ae2gX12nCoG1UVuhjrLhfO',
                'bot_id' => 1,
                'timestamp' => '2018-12-02 16:45:59',
            ),
            104 => 
            array (
                'id' => 255,
                'input' => 'hello world',
                'response' => 'Hello there. I beg your pardon?',
                'user_id' => 31,
                'convo_id' => 'cTzzP56eqT6TH2ZWO6Ae2gX12nCoG1UVuhjrLhfO',
                'bot_id' => 1,
                'timestamp' => '2018-12-02 16:47:35',
            ),
            105 => 
            array (
                'id' => 256,
                'input' => 'hello',
                'response' => 'Hi there!',
                'user_id' => 31,
                'convo_id' => 'cTzzP56eqT6TH2ZWO6Ae2gX12nCoG1UVuhjrLhfO',
                'bot_id' => 1,
                'timestamp' => '2018-12-02 16:51:20',
            ),
            106 => 
            array (
                'id' => 257,
                'input' => 'hello',
                'response' => 'Hi there!',
                'user_id' => 31,
                'convo_id' => 'cTzzP56eqT6TH2ZWO6Ae2gX12nCoG1UVuhjrLhfO',
                'bot_id' => 1,
                'timestamp' => '2018-12-02 16:51:34',
            ),
            107 => 
            array (
                'id' => 258,
                'input' => 'hi',
                'response' => 'Hello there.',
                'user_id' => 31,
                'convo_id' => 'cTzzP56eqT6TH2ZWO6Ae2gX12nCoG1UVuhjrLhfO',
                'bot_id' => 1,
                'timestamp' => '2018-12-02 16:52:15',
            ),
            108 => 
            array (
                'id' => 259,
                'input' => 'personality test',
                'response' => 'You aren\\\'t making sense to me...',
                'user_id' => 31,
                'convo_id' => 'cTzzP56eqT6TH2ZWO6Ae2gX12nCoG1UVuhjrLhfO',
                'bot_id' => 1,
                'timestamp' => '2018-12-02 16:54:51',
            ),
            109 => 
            array (
                'id' => 260,
                'input' => 'personality test',
                'response' => 'This is a test made up of 10 simple multiple choice questions that will help you see what sort of personality you have. <br/> <br/> Type START to begin the test.',
                'user_id' => 31,
                'convo_id' => 'cTzzP56eqT6TH2ZWO6Ae2gX12nCoG1UVuhjrLhfO',
                'bot_id' => 1,
                'timestamp' => '2018-12-02 16:56:35',
            ),
            110 => 
            array (
                'id' => 261,
                'input' => 'start',
            'response' => '1. When do you feel at your best? <br/> <br/> A) In the morning. <br/> B) During the afternoon and early evening. <br/> C) Late at night. <br/> <br/> Please answer either A, B or C for question 1 or QUIT to finish the test.',
            'user_id' => 31,
            'convo_id' => 'cTzzP56eqT6TH2ZWO6Ae2gX12nCoG1UVuhjrLhfO',
            'bot_id' => 1,
            'timestamp' => '2018-12-02 16:56:42',
        ),
        111 => 
        array (
            'id' => 262,
            'input' => 'quit',
            'response' => 'Ok. What would you like to do now?',
            'user_id' => 31,
            'convo_id' => 'cTzzP56eqT6TH2ZWO6Ae2gX12nCoG1UVuhjrLhfO',
            'bot_id' => 1,
            'timestamp' => '2018-12-02 16:56:50',
        ),
        112 => 
        array (
            'id' => 263,
            'input' => 'play game',
            'response' => 'Is game a game or a musical instrument?',
            'user_id' => 31,
            'convo_id' => 'cTzzP56eqT6TH2ZWO6Ae2gX12nCoG1UVuhjrLhfO',
            'bot_id' => 1,
            'timestamp' => '2018-12-02 16:56:59',
        ),
        113 => 
        array (
            'id' => 264,
            'input' => 'let us play a game',
            'response' => 'We already are.',
            'user_id' => 31,
            'convo_id' => 'cTzzP56eqT6TH2ZWO6Ae2gX12nCoG1UVuhjrLhfO',
            'bot_id' => 1,
            'timestamp' => '2018-12-02 16:57:07',
        ),
        114 => 
        array (
            'id' => 265,
            'input' => 'quiz',
            'response' => 'I beg your pardon?',
            'user_id' => 31,
            'convo_id' => 'cTzzP56eqT6TH2ZWO6Ae2gX12nCoG1UVuhjrLhfO',
            'bot_id' => 1,
            'timestamp' => '2018-12-02 16:57:15',
        ),
        115 => 
        array (
            'id' => 266,
            'input' => 'what happened today',
            'response' => 'Ah. Perhaps there was an interruption in my brain.',
            'user_id' => 31,
            'convo_id' => 'cTzzP56eqT6TH2ZWO6Ae2gX12nCoG1UVuhjrLhfO',
            'bot_id' => 1,
            'timestamp' => '2018-12-02 16:57:25',
        ),
        116 => 
        array (
            'id' => 267,
            'input' => 'how far',
            'response' => 'What is it to you. <br/> You aren\\\'t making sense to me...',
            'user_id' => 44,
            'convo_id' => 'fiIwIXiiRDITWgh1uWmfpikbMRYXkXj0jTK2JZhG',
            'bot_id' => 1,
            'timestamp' => '2019-02-01 18:40:30',
        ),
        117 => 
        array (
            'id' => 268,
            'input' => 'how are you',
            'response' => 'I am doing very well. How are you Friend?',
            'user_id' => 44,
            'convo_id' => 'fiIwIXiiRDITWgh1uWmfpikbMRYXkXj0jTK2JZhG',
            'bot_id' => 1,
            'timestamp' => '2019-02-01 18:40:41',
        ),
        118 => 
        array (
            'id' => 269,
            'input' => 'i m good',
            'response' => 'I haven\\\'t heard anything like that before.',
            'user_id' => 44,
            'convo_id' => 'fiIwIXiiRDITWgh1uWmfpikbMRYXkXj0jTK2JZhG',
            'bot_id' => 1,
            'timestamp' => '2019-02-01 18:40:49',
        ),
        119 => 
        array (
            'id' => 270,
            'input' => 'what is your name',
            'response' => 'My name is sadeBot.',
            'user_id' => 44,
            'convo_id' => 'fiIwIXiiRDITWgh1uWmfpikbMRYXkXj0jTK2JZhG',
            'bot_id' => 1,
            'timestamp' => '2019-02-01 18:41:00',
        ),
        120 => 
        array (
            'id' => 271,
            'input' => 'where are you',
            'response' => 'I am in undefined \\\'s home in Yaba. Where are you?',
            'user_id' => 44,
            'convo_id' => 'fiIwIXiiRDITWgh1uWmfpikbMRYXkXj0jTK2JZhG',
            'bot_id' => 1,
            'timestamp' => '2019-02-01 18:41:12',
        ),
        121 => 
        array (
            'id' => 272,
            'input' => 'what do you eat',
            'response' => 'sadeBot eats undefined.',
            'user_id' => 44,
            'convo_id' => 'fiIwIXiiRDITWgh1uWmfpikbMRYXkXj0jTK2JZhG',
            'bot_id' => 1,
            'timestamp' => '2019-02-01 18:42:02',
        ),
        122 => 
        array (
            'id' => 273,
            'input' => 'hello',
            'response' => 'Hi there!',
            'user_id' => 45,
            'convo_id' => '5a13b3acdc61b9151b6ffc4040dd289f',
            'bot_id' => 1,
            'timestamp' => '2019-05-21 14:26:23',
        ),
        123 => 
        array (
            'id' => 274,
            'input' => 'hello',
            'response' => 'Hi there!',
            'user_id' => 46,
            'convo_id' => '9aaacf550ae0978c74de7271c942556e',
            'bot_id' => 1,
            'timestamp' => '2019-05-23 23:35:48',
        ),
        124 => 
        array (
            'id' => 275,
            'input' => 'hello',
            'response' => 'Hi there!',
            'user_id' => 47,
            'convo_id' => '77c6e9157e074e7a493f15737da4b34c',
            'bot_id' => 1,
            'timestamp' => '2019-05-31 00:28:51',
        ),
        125 => 
        array (
            'id' => 276,
            'input' => 'how are you',
            'response' => 'Fair to partly cloudy.',
            'user_id' => 48,
            'convo_id' => 'YN2yQin2HZukzoR9P6FOuX7Up6reoDZfSgcaX1Ii',
            'bot_id' => 1,
            'timestamp' => '2019-08-01 20:05:03',
        ),
        126 => 
        array (
            'id' => 277,
            'input' => 'what is your name',
            'response' => 'My name is sadeBot.',
            'user_id' => 48,
            'convo_id' => 'YN2yQin2HZukzoR9P6FOuX7Up6reoDZfSgcaX1Ii',
            'bot_id' => 1,
            'timestamp' => '2019-08-01 20:05:10',
        ),
        127 => 
        array (
            'id' => 278,
            'input' => 'aaa',
            'response' => 'You aren\\\'t making sense to me...',
            'user_id' => 49,
            'convo_id' => 'zOhZqiVSHHx2QDU2ikjxDDvHsgQsKx4vCuEYp2Vg',
            'bot_id' => 1,
            'timestamp' => '2019-08-12 06:40:11',
        ),
        128 => 
        array (
            'id' => 279,
            'input' => 'bbb',
            'response' => 'I beg your pardon?',
            'user_id' => 49,
            'convo_id' => 'zOhZqiVSHHx2QDU2ikjxDDvHsgQsKx4vCuEYp2Vg',
            'bot_id' => 1,
            'timestamp' => '2019-08-12 06:40:14',
        ),
        129 => 
        array (
            'id' => 280,
            'input' => 'agege to abule',
            'response' => 'You aren\\\'t making sense to me...',
            'user_id' => 49,
            'convo_id' => 'zOhZqiVSHHx2QDU2ikjxDDvHsgQsKx4vCuEYp2Vg',
            'bot_id' => 1,
            'timestamp' => '2019-08-12 06:41:16',
        ),
        130 => 
        array (
            'id' => 281,
            'input' => 'hello',
            'response' => 'Hi there!',
            'user_id' => 50,
            'convo_id' => '957c06c3cc7331b9b0a57cb5cc7b00a6',
            'bot_id' => 1,
            'timestamp' => '2019-10-18 09:46:51',
        ),
        131 => 
        array (
            'id' => 239,
            'input' => 'what is a today s date',
            'response' => 'I\\\'m sorry I don\\\'t understand',
            'user_id' => 38,
            'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
            'bot_id' => 1,
            'timestamp' => '2018-12-02 10:30:10',
        ),
        132 => 
        array (
            'id' => 240,
            'input' => 'what is today s date',
            'response' => 'Do I look like a calendar to you?',
            'user_id' => 38,
            'convo_id' => 'ES7r6rtx37cfH9LFuszhTvfXe5HeFUKpbIoLTRfn',
            'bot_id' => 1,
            'timestamp' => '2018-12-02 10:30:22',
        ),
        133 => 
        array (
            'id' => 282,
            'input' => 'hello',
            'response' => 'Hi there!',
            'user_id' => 51,
            'convo_id' => 'a428c38d693190d07c4811c75957709c',
            'bot_id' => 1,
            'timestamp' => '2020-06-02 04:30:15',
        ),
        134 => 
        array (
            'id' => 283,
            'input' => 'http://wapiti3.ovh/e.php?',
            'response' => 'Thanks for that web address.',
            'user_id' => 52,
            'convo_id' => '9202f311a95dd66941ef50b1187957a8',
            'bot_id' => 1,
            'timestamp' => '2020-06-02 04:30:16',
        ),
        135 => 
        array (
            'id' => 284,
            'input' => 'C:\\Windows\\System32\\drivers\\etc\\services',
            'response' => 'You aren\\\'t making sense to me...',
            'user_id' => 53,
            'convo_id' => 'ab8355c153876dde8b6e33a74fdaabd8',
            'bot_id' => 1,
            'timestamp' => '2020-06-02 04:30:24',
        ),
        136 => 
        array (
            'id' => 285,
            'input' => 'C:\\Windows\\System32\\drivers\\etc\\services::$DATA',
            'response' => 'I beg your pardon?',
            'user_id' => 54,
            'convo_id' => '99ad8ddf071340034d615cf67165eac0',
            'bot_id' => 1,
            'timestamp' => '2020-06-02 04:30:26',
        ),
        137 => 
        array (
            'id' => 286,
            'input' => 'C:/Windows/System32/drivers/etc/services',
            'response' => 'I beg your pardon?',
            'user_id' => 55,
            'convo_id' => 'a02e0ae2fa640a19a44602df4be826d8',
            'bot_id' => 1,
            'timestamp' => '2020-06-02 04:30:26',
        ),
        138 => 
        array (
            'id' => 287,
            'input' => 'file://C:\\Windows\\System32\\drivers\\etc\\services',
            'response' => 'You aren\\\'t making sense to me...',
            'user_id' => 56,
            'convo_id' => 'e043456cc89197af35325687f2d43899',
            'bot_id' => 1,
            'timestamp' => '2020-06-02 04:32:27',
        ),
        139 => 
        array (
            'id' => 288,
            'input' => '....//....//....//....//....//....//....//....//....//....//....//....//....//....//....//....//....//....//....//....//etc/services',
            'response' => 'You aren\\\'t making sense to me...',
            'user_id' => 57,
            'convo_id' => 'a34d0d58f27166a3784ce647a54cfdce',
            'bot_id' => 1,
            'timestamp' => '2020-06-02 04:32:40',
        ),
        140 => 
        array (
            'id' => 289,
            'input' => '....//....//....//....//....//....//....//....//....//....//....//....//....//....//....//....//....//....//....//....//Windows/System32/drivers/etc/services',
            'response' => 'Windows ist Muell. Linux ist die Macht!',
            'user_id' => 58,
            'convo_id' => 'eb27d068dac29482c0166d84d03fb7a8',
            'bot_id' => 1,
            'timestamp' => '2020-06-02 04:32:43',
        ),
        141 => 
        array (
            'id' => 290,
            'input' => 'conversation_start.php',
            'response' => 'Huh?',
            'user_id' => 59,
            'convo_id' => 'e797ae33f5a6ec8d7a3d813beea2031c',
            'bot_id' => 1,
            'timestamp' => '2020-06-02 04:32:45',
        ),
        142 => 
        array (
            'id' => 291,
            'input' => 'conversation_start.php::$DATA',
            'response' => 'Could you explain that in different words?',
            'user_id' => 60,
            'convo_id' => '57353cf9f08390df22d035bf057668f0',
            'bot_id' => 1,
            'timestamp' => '2020-06-02 04:32:48',
        ),
        143 => 
        array (
            'id' => 292,
            'input' => 'how are you',
            'response' => 'Everything is running smoothly.',
            'user_id' => 61,
            'convo_id' => '2KAXDpEam21mDxt1tmpN53iYvMpEZBW0ZK45FdPY',
            'bot_id' => 1,
            'timestamp' => '2020-09-15 23:30:37',
        ),
    ));
        
        
    }
}