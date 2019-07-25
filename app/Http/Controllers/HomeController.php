<?php

namespace App\Http\Controllers;

use App\ActivityLogModel;
use App\AdminModel;
use App\HomeModel;
use App\Search;
use App\UserModel;
use App\UtilitiesModel;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index() {

        $response['routes'] = Search::all();
        $response['status'] = true;
        $response['title'] = 'Home';
        $response['bot_id'] = 1;

        return view('index', $response);
    }

    public function contactUs() {
        $response['title'] = 'Contact Us';
        $response['status'] = true;

        return view('pages.contact', $response);
    }

    public function about() {
        $response['title'] = 'About Us';
        $response['status'] = true;

        return view('pages.about', $response);
    }

    public function team() {
        $response['title'] = 'Our Team';
        $response['status'] = true;

        return view('pages.team', $response);
    }

    public function services() {
        $response['title'] = 'Our Services';
        $response['status'] = true;

        return view('pages.services', $response);
    }


    public function privacy() {
        $response['title'] = 'Privacy Policy';
        $response['status'] = true;

        return view('pages.privacy', $response);
    }

    public function faq() {
        $response['title'] = 'Frequently Asked Questions';
        $response['status'] = true;

        return view('pages.faq', $response);
    }

    public function terms() {
        $response['title'] = 'Terms and Conditions';
        $response['status'] = true;

        return view('pages.terms', $response);
    }

    public function contact(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            $response['code'] = STATUS_VALIDATION_FAILED;
            $response['status'] = false;
            $response['error'] = $validator->errors();

            return response()->json($response, $response['code']);
        }

        //save
        $save = HomeModel::contact($request->input());

        return response()->json($save, $save['code']);
    }
}
