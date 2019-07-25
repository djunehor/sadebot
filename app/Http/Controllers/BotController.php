<?php

namespace App\Http\Controllers;

use App\BotModel;
use App\UtilitiesModel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class BotController extends Controller
{
    private $botURL = 'https://botapi.jobzad.com/chatbot/conversation_start.php';
    private $jobURL = 'https://jobzad.com/api/jobs';
    private $subscribeUrl = 'https://jobzad.com/api/subscribe';

    private $cache = [
        'location' => false,
        'keyword' => false,
        'email' => false,
        'awaiting_email_response' => false,
        'awaiting_email_validation' => false,
        'awaiting_whatsapp_response' => false,
        'awaiting_whatsapp_validation' => false,
        'awaiting_telegram_response' => false,
        'awaiting_telegram_validation' => false
    ];

    private $convoId;
    private $botId;

    public function __construct()
    {
        $this->convoId = request('convo_id');
        $this->botId = request('bot_id');
        $this->cache = Cache::get($this->convoId) ?? $this->cache;
        Log::info('Cache : '. json_encode( $this->cache));
    }

    public function processChat(Request $request) {
        //here we process request and decide if it should just goto botapi
        $userInput = strtolower($request->input('say'));

        //if it's direction request
        if (strchr(strtoupper($userInput),'FROM') && strchr(strtoupper($userInput),'TO')) {

            $response['key'] = 'direction';
           $data = BotModel::getDirections($userInput);
        }

        //if it's a dictionary request
        elseif(strpos($userInput, 'define') !== false) {
            $response['key'] = 'definition';
            $data = BotModel::getDefinitions($userInput);
        }

        //if it's a job request
        elseif(strpos($userInput, 'job') !== false) {
            $response['key'] = 'job';
            $pieces = explode(" ", $userInput);

            $location = false;
            if(strpos($userInput, 'in') !== false) {
                $location = $pieces[array_search('in', $pieces) + 1];
            }

            $keyword = false;
            if(strpos($userInput, 'need') !== false) {
                $keyword = $pieces[array_search('need', $pieces) + 1];

                if(strpos($keyword, 'job')  !== false) {
                    $keyword = false;
                }
            }

            $number = preg_replace('/\D/', '', $userInput);
            $limit = is_numeric($number) ? $number : 5;
            $url = $this->jobURL."?keyword=$keyword&location=$location&limit=5";
            $res = UtilitiesModel::getWebPage($url);

            $res = json_decode($res);

            $jobs = false;
            foreach($res as $datum) {
                $jobs .= '<p><b>'.$datum->title.' ('.$datum->location.')</b><br>'.implode(' ', array_slice(explode(' ', $datum->summary), 0, 10)).' <a target="_blank" href="'.$datum->url.'">view</a></p><br>';
            }

            if(!$jobs) {
                $data = "I didn't find any jobs.";

                if($keyword) {
                    Log::info("Found keyword $keyword and $location");
                    $data .= " Kindly provide your email address so I can alert you when I find $keyword jobs " . (($location) ? 'in ' . $location.' ' : false) . "for you.";

                    $this->cache['location'] = $location;
                    $this->cache['keyword'] = $keyword;
                    $this->cache['awaiting_email_response'] = true;

                    Cache::put($this->convoId, $this->cache, 2);
                }
            } else {
                $data = $jobs;

            }
        }

        elseif($this->cache['awaiting_email_response'] && $email = UtilitiesModel::getEmail($userInput)) {
            $this->cache['awaiting_email_response'] = false;
            $this->cache['awaiting_email_validation'] = true;
            $this->cache['email'] = $email;
            Cache::put($this->convoId, $this->cache, 2);
            $data = "Should I save your email as $email?";
        }

        elseif($this->cache['awaiting_email_validation']) {
            if(strpos($userInput, 'yes') !== false || strpos($userInput, 'yea') !== false) {
                $data = "I will send emails to ".$this->cache['email']." when I find ".$this->cache['keyword']." jobs";
                $data .= $this->cache['location'] ? " in ".$this->cache['location'] : "";

                $this->cache['awaiting_email_validation'] = false;
                $this->cache['awaiting_whatsapp_response'] = true;
                $data .= ". Kindly provide your whatsapp number so I can alert you when I find {$this->cache['keyword']} jobs";
                $data .= $this->cache['location'] ? " in ".$this->cache['location'] : '';
                Cache::put($this->convoId, $this->cache, 2);
                UtilitiesModel::getWebPage($this->subscribeUrl, $this->cache);
            } else {
                Cache::forget($this->convoId);
                $data = $this->botResponse($userInput);
            }

        }

        elseif($this->cache['awaiting_whatsapp_response'] && $whatsapp = UtilitiesModel::validatePhone($userInput)) {
            $this->cache['awaiting_whatsapp_response'] = false;
            $this->cache['awaiting_whatsapp_validation'] = true;
            $this->cache['whatsapp'] = $whatsapp;
            Cache::put($this->convoId, $this->cache, 2);
            $data = "Should I save your whatsapp number as $whatsapp?";
        }
        elseif($this->cache['awaiting_whatsapp_validation']) {
            if(strpos($userInput, 'yes') !== false || strpos($userInput, 'yea') !== false) {
                $data = "I will send messages to ".$this->cache['whatsapp']." when I find ".$this->cache['keyword']." jobs";
                $data .= $this->cache['location'] ? " in ".$this->cache['location'] : "";

                $this->cache['awaiting_whatsapp_validation'] = false;
                $this->cache['awaiting_telegram_response'] = true;
//                $data .= ". Kindly provide your telegram number so I can alert you when I find {$this->cache['keyword']} jobs";
//                $data .= $this->cache['location'] ? " in ".$this->cache['location'] : '';

                UtilitiesModel::getWebPage($this->subscribeUrl, $this->cache);
            } else {
                Cache::forget($this->convoId);
                $data = $this->botResponse($userInput);
            }
        }

        elseif($this->cache['awaiting_telegram_response'] && $telegram = UtilitiesModel::validatePhone($userInput)) {
            $this->cache['awaiting_telegram_response'] = false;
            $this->cache['awaiting_telegram_validation'] = true;
            $this->cache['telegram'] = $telegram;
            Cache::put($this->convoId, $this->cache, 2);
            $data = "Should I save your telegram number as $telegram?";
        }
        elseif($this->cache['awaiting_telegram_validation']) {
            if(strpos($userInput, 'yes') !== false || strpos($userInput, 'yea') !== false) {
                $data = "I will send messages to ".$this->cache['telegram']." when I find ".$this->cache['keyword']." jobs";
                $data .= $this->cache['location'] ? " in ".$this->cache['location'] : "";

                Cache::put($this->convoId, $this->cache, 2);

            } else {
                Cache::forget($this->convoId);
                $data = $this->botResponse($userInput);
            }
        }

        //if it's none
        elseif($userInput == 'clear') {

            DB::table('conversation_log')->where('convo_id', request('convo_id'))->delete();
            $data = "Now we can have a fresh start!";
        }
        else {
            $data = $this->botResponse($userInput);
        }

        $response['status'] = true;
        $response['message'] = $data;

        return $response;
    }

    public function loadChat() {
        $response['status'] = true;
        $response['message'] = DB::table('conversation_log')->where('convo_id', request('convo_id'))->limit(100)->get();

        return $response;
    }

    public function botResponse($userInput) {
        $url = $this->botURL.'?say='.urlencode($userInput).'&convo_id='.$this->convoId.'&bot_id='.$this->botId;
        $res = UtilitiesModel::getWebPage($url);

        $get = json_decode($res, true);

        return $get['botsay'];
    }
}
