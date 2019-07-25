<?php

namespace App;

use App\Mail\SendMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeModel extends Model
{
    public static function contact($data) {

        $mail['sender'] = $data['email'];
        $mail['subject'] = $data['subject'];
        $mail['message'] = $data['message'];

        $websiteData = (array) AdminModel::websiteData();

        $to = array_key_exists('email', $websiteData) ? $websiteData['email'] : env('ADMIN_EMAIL');

        $send = Mail::to($to)->send(new SendMail($mail));

        return $send;
    }
}
