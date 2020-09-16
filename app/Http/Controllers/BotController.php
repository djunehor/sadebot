<?php

namespace App\Http\Controllers;

use App\Bot;
use App\Conversation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Propaganistas\LaravelPhone\PhoneNumber;


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

    }

    public function processChat(Request $request)
    {
        //here we process request and decide if it should just goto botapi
        $userInput = strtolower($request->input('say'));
        $data = "";

        //if it's direction request
        if (
            strchr(strtoupper($userInput), 'FROM')
            && strchr(strtoupper($userInput), 'TO')
        ) {

            $response['key'] = 'direction';
            $data = Bot::getDirections($userInput);
        }

        //if it's a dictionary request
        elseif (strpos($userInput, 'define') !== false) {
            $response['key'] = 'definition';
            $data = Bot::getDefinitions($userInput);
        }

        //if it's a job request
        elseif (strpos($userInput, 'job') !== false) {
            $response['key'] = 'job';
            $this->jobRequest($userInput, $data);
        }

        elseif ($this->cache['awaiting_email_response'] && $email = parseEmail($userInput)) {
            $this->handleAwaitingEmailResponse($email, $data);
        }

        elseif ($this->cache['awaiting_email_validation']) {
            if (
                strpos($userInput, 'yes') !== false
                || strpos($userInput, 'yea') !== false
            ) {
                $this->requestPhone($data);
            }
            else {
                Cache::forget($this->convoId);
                $data = $this->botResponse($userInput);
            }

        } elseif (
            $this->cache['awaiting_whatsapp_response']
            && $whatsapp = PhoneNumber::make($userInput, 'NG')->formatE164()
        ) {
            $this->handleAwaitingWhatsappResponse($whatsapp, $data);
        }
        elseif ($this->cache['awaiting_whatsapp_validation']) {
            if (
                strpos($userInput, 'yes') !== false
                || strpos($userInput, 'yea') !== false
            ) {
                $this->requestWhatsapp($data);

            }
            else {
                Cache::forget($this->convoId);
                $this->cache['whatsapp'] = false;
                $data = $this->botResponse($userInput);

                $remoteResponse = httpRequest($this->subscribeUrl, $this->cache);
            }

        }
        elseif ($this->cache['awaiting_telegram_response']) {
            $this->handleAwaitingTelegramResponse($userInput, $data);
        }
        elseif ($this->cache['awaiting_telegram_validation']) {
            if (strpos($userInput, 'yes') !== false || strpos($userInput, 'yea') !== false) {
                $this->requestTelegram($data);

            }
            else {
                Cache::forget($this->convoId);
                $this->cache['telegram'] = false;
                $this->cache['first_name'] = false;
                $this->cache['last_name'] = false;
                $data = $this->botResponse($userInput);
            }
            $remoteResponse = httpRequest($this->subscribeUrl, $this->cache);
            //  Log::info('Remote server : '. $remoteResponse);
        }

        //if it's none
        elseif ($userInput == 'clear') {

            Conversation::query()
                ->where('convo_id', $request->input('convo_id'))
                ->delete();
            $data = "Now we can have a fresh start!";
        } else {
            $data = $this->botResponse($userInput);
            // $tr = new TranslateClient('en', 'yo');

            // $data .= "\n".$tr->translate('Hello World!');
        }

        $response['status'] = true;
        $response['message'] = $data;

        return $response;
    }

    public function loadChat(Request $request)
    {
        $response['status'] = true;
        $response['message'] = Conversation::query()
            ->where('convo_id', $request->input('convo_id'))
            ->limit(100)->get();

        return $response;
    }

    private function botResponse($userInput)
    {
        $url = $this->botURL . '?say=' . urlencode($userInput) . '&convo_id=' . $this->convoId . '&bot_id=' . $this->botId;
        $res = httpRequest($url);

        $get = json_decode($res, true);

        return $get['botsay'];
    }

    private function jobRequest(string $userInput, string &$data)
    {
        $pieces = explode(" ", $userInput);

        $location = false;
        if (strpos($userInput, 'in') !== false) {
            $location = $pieces[array_search('in', $pieces) + 1];
        }

        $keyword = false;
        if (strpos($userInput, 'need') !== false) {
            $keyword = $pieces[array_search('need', $pieces) + 1];

            if (strpos($keyword, 'job') !== false) {
                $keyword = false;
            }
        }

        $number = preg_replace('/\D/', '', $userInput);
        $limit = is_numeric($number) ? $number : 5;
        $url = $this->jobURL . "?keyword=$keyword&location=$location&limit=5";
        $res = httpRequest($url);


        $res = json_decode($res);

        $jobs = false;
        foreach ($res as $datum) {
            $jobs .= '<p><b>' . $datum->title . ' (' . $datum->location . ')</b><br>' . implode(' ', array_slice(explode(' ', $datum->summary), 0, 10)) . ' <a target="_blank" href="' . $datum->url . '">view</a></p><br>';
        }

        if (!$jobs) {
            $data = "I didn't find any jobs.";

            if ($keyword) {

                $data .= " Kindly provide your email address so I can alert you when I find $keyword jobs " . (($location) ? 'in ' . $location . ' ' : false) . "for you.";

                $this->cache['location'] = $location;
                $this->cache['keyword'] = $keyword;
                $this->cache['awaiting_email_response'] = true;

                Cache::put($this->convoId, $this->cache, 2);
            }
        } else {
            $data = $jobs;
        }
    }

    private function handleAwaitingEmailResponse(string $email, string &$data)
    {
        $this->cache['awaiting_email_response'] = false;
        $this->cache['awaiting_email_validation'] = true;
        $this->cache['email'] = $email;
        Cache::put($this->convoId, $this->cache, 2);
        $data = "Should I save your email as $email?";
    }

    private function handleAwaitingWhatsappResponse(string $whatsapp, string &$data)
    {
        $this->cache['awaiting_whatsapp_response'] = false;
        $this->cache['awaiting_whatsapp_validation'] = true;
        $this->cache['whatsapp'] = $whatsapp;
        Cache::put($this->convoId, $this->cache, 2);
        $data = "Should I save your whatsapp number as $whatsapp?";
    }

    private function handleAwaitingTelegramResponse(string $userInput, string &$data)
    {
        $this->cache['awaiting_telegram_response'] = false;
        $this->cache['awaiting_telegram_validation'] = true;
        $this->cache['telegram'] = $telegram = $userInput;
        Cache::put($this->convoId, $this->cache, 2);
        $data = "Should I save your name as $telegram?";
    }

    private function requestPhone(string &$data)
    {
        $data = "I will send emails to " . $this->cache['email'] . " when I find " . $this->cache['keyword'] . " jobs";
        $data .= $this->cache['location'] ? " in " . $this->cache['location'] : "";

        $this->cache['awaiting_email_validation'] = false;
        $this->cache['awaiting_whatsapp_response'] = true;
        $data .= ". Kindly provide your whatsapp number so I can alert you when I find {$this->cache['keyword']} jobs";
        $data .= $this->cache['location'] ? " in " . $this->cache['location'] : '';
        Cache::put($this->convoId, $this->cache, 2);

    }

    private function requestWhatsapp(string &$data)
    {
        $data = "I will send messages to " . $this->cache['whatsapp'] . " when I find " . $this->cache['keyword'] . " jobs";
        $data .= $this->cache['location'] ? " in " . $this->cache['location'] : "";

        $this->cache['awaiting_whatsapp_validation'] = false;
        $this->cache['awaiting_telegram_response'] = true;
        $data .= ". Kindly provide your name so I can alert you with your name when I find {$this->cache['keyword']} jobs";
        $data .= $this->cache['location'] ? " in " . $this->cache['location'] : '';
        Cache::put($this->convoId, $this->cache, 2);
    }

    private function requestTelegram(string &$data)
    {
        $data = "I will call you " . $this->cache['telegram'] . " when I find " . $this->cache['keyword'] . " jobs";
        $data .= $this->cache['location'] ? " in " . $this->cache['location'] : "";

        Cache::put($this->convoId, $this->cache, 2);

        $name = explode(" ", $this->cache['telegram']);
        $this->cache['first_name'] = ucfirst($name[0]);
        $this->cache['last_name'] = array_key_exists(1, $name) ? ucfirst($name[1]) : false;

        $user = Conversation::query()
            ->where('convo_id', $this->convoId)
            ->first();

        if ($user) {
            $update = User::query()
                ->where('user_id', $user->user_id)
                ->update([
                    'user_name' => ucwords($this->cache['telegram'])
                ]);
        }
    }
}
