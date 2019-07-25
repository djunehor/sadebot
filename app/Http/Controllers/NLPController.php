<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use thiagoalessio\TesseractOCR\TesseractOCR;

class NLPController extends Controller
{
    public function NLPTest(Request $request) {
        $userInput = $request->say;
        $response['status'] = true;
        $response['message'] = $this->getResponse($userInput);

        return $response;
    }
    public function formatFile() {
        $path = "C:\laragon\www\dataset\\fourforums_2016_05_18.sql\\fourforums_2016_05_18.sql";
        $spl = new \SplFileObject($path);
		
        $response = "";

        set_time_limit(0);
        $start = 500;
        $range = 50;
        for($i = $start; $i < ($start + $range); $i++) {
            $spl->seek($i);
            $line  = $spl->current();
            $response .= "$line<br>";
//
//            if(count($text) < 2) {
//                continue;
//            }
//
//            $string = preg_replace("/[^a-zA-Z0-9 ?']/", '', strip_tags($text[1]));
//
//                if(empty($string)) {
//                    continue;
//                }
//
//                $response .= "$string.<br>";
//
//				if(DB::table('chat_messages')->where('text', $string)->count() < 1) {
//                    DB::table('chat_messages')->insert([
//                        'text' => strip_tags($string),
//                        'source' => $path
//                    ]);
//                }

        }

        return $response;
    }

    public function getResponse(string $userInput)
    {
        $matches = DB::table('chat_messages')->where('text', 'like', "%$userInput%")->pluck('text');

        $shortest = -1;

        foreach ($matches as $word) {
            //for each text match, calculate percent match
            // calculate the distance between the input word,
            // and the current word
            $lev = $this->LevenshteinDistance($userInput, $word);

            // check for an exact match
            if ($lev == 0) {

                // closest word is this one (exact match)
                $closest = $word;
                $shortest = 0;

                // break out of the loop; we've found an exact match
                break;
            }

            // if this distance is less than the next found shortest
            // distance, OR if a next shortest word has not yet been found
            if ($lev <= $shortest || $shortest < 0) {
                // set the closest match, and shortest distance
                $closest  = $word;
                $shortest = $lev;
            }
        }

        $dbInput = ($shortest == 0) ? $closest : $closest;

        Log::info("Best input match is $dbInput");

        $nextMatch = DB::table('chat_messages')->where('text', $dbInput)->first()->id;

        $newMatches = DB::table('chat_messages')
            ->where('id', $nextMatch + 1)
           // ->orWhere('id', $nextMatch - 1)
            ->pluck('text');

        $shortest = -1;

        foreach ($newMatches as $word) {
            //for each text match, calculate percent match
            // calculate the distance between the input word,
            // and the current word
            $lev = $this->LevenshteinDistance($userInput, $word);

            // check for an exact match
            if ($lev == 0) {

                // closest word is this one (exact match)
                $closest = $word;
                $shortest = 0;

                // break out of the loop; we've found an exact match
                break;
            }

            // if this distance is less than the next found shortest
            // distance, OR if a next shortest word has not yet been found
            if ($lev <= $shortest || $shortest < 0) {
                // set the closest match, and shortest distance
                $closest  = $word;
                $shortest = $lev;
            }
        }

        return $closest ?? "Say that again?";
    }

    public function LevenshteinDistance($s1, $s2)
    {
        $sLeft = (strlen($s1) > strlen($s2)) ? $s1 : $s2;
        $sRight = (strlen($s1) > strlen($s2)) ? $s2 : $s1;
        $nLeftLength = strlen($sLeft);
        $nRightLength = strlen($sRight);
        if ($nLeftLength == 0)
            return $nRightLength;
        else if ($nRightLength == 0)
            return $nLeftLength;
        else if ($sLeft === $sRight)
            return 0;
        else if (($nLeftLength < $nRightLength) && (strpos($sRight, $sLeft) !== FALSE))
            return $nRightLength - $nLeftLength;
        else if (($nRightLength < $nLeftLength) && (strpos($sLeft, $sRight) !== FALSE))
            return $nLeftLength - $nRightLength;
        else {
            $nsDistance = range(1, $nRightLength + 1);
            for ($nLeftPos = 1; $nLeftPos <= $nLeftLength; ++$nLeftPos)
            {
                $cLeft = $sLeft[$nLeftPos - 1];
                $nDiagonal = $nLeftPos - 1;
                $nsDistance[0] = $nLeftPos;
                for ($nRightPos = 1; $nRightPos <= $nRightLength; ++$nRightPos)
                {
                    $cRight = $sRight[$nRightPos - 1];
                    $nCost = ($cRight == $cLeft) ? 0 : 1;
                    $nNewDiagonal = $nsDistance[$nRightPos];
                    $nsDistance[$nRightPos] =
                        min($nsDistance[$nRightPos] + 1,
                            $nsDistance[$nRightPos - 1] + 1,
                            $nDiagonal + $nCost);
                    $nDiagonal = $nNewDiagonal;
                }
            }
            return $nsDistance[$nRightLength];
        }
    }

    public function imageProcess() {
        return (new TesseractOCR(public_path('assets/sade.jpg')))
            ->run();
    }

}
