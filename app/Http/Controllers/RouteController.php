<?php

namespace App\Http\Controllers;

use App\RouteModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RouteController extends Controller
{
    private $routeModel;

    public function __construct()
    {
        $this->routeModel = new RouteModel();

    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'from' => 'required',
            'to' => 'required',
            'nodes' => 'required',
            'price' => 'required|numeric',
            'distance' => 'numeric',
        ]);

        Log::info('PAYLOAD: '. json_encode($request->all()));

        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = implode("", $validator->messages()->all());

            return response()->json($response);
        }

        $response = $this->routeModel->create($request->input());

        return response()->json($response);

    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'from' => 'required',
            'to' => 'required',
            'nodes' => 'required',
            'price' => 'required|numeric',
            'distance' => 'numeric',
        ]);

        Log::info('PAYLOAD: '. json_encode($request->all()));

        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = implode("", $validator->messages()->all());

            return response()->json($response);
        }

        $response = $this->routeModel->updateRoute($id, $request->input());

        return response()->json($response);

    }

    public function getAll(Request $request) {

        return  $this->routeModel->allRoutes($request);
    }

    public function delete($id) {

        return  $this->routeModel->deleteRoute($id);
    }
}
