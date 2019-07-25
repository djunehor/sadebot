<?php

namespace App\Http\Controllers;

use App\RouteModel;

class FrontController extends Controller
{
    public function newRoute() {
        $response['title'] = 'New Route';

        return view('new_route', $response);
    }

    public function allRoute() {
        $response['title'] = 'All Route';

        return view('routes', $response);
    }

    public function editRoute($id) {
        $response['route'] = (new RouteModel())->getSingle($id);
        $response['title'] = "Edit route";

        return view('edit_route', $response);
    }

}
