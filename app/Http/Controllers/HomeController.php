<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index() {
        $response['status'] = true;
        $response['title'] = 'Home';
        $response['bot_id'] = 1;

        return view('index', $response);
    }
}
