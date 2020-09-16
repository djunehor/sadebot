<?php

namespace App\Http\Controllers;

use App\Route;
use App\Vehicle;
use Illuminate\Http\Request;;

class RouteController extends Controller
{

    public function index() {
        $response['routes'] = Route::query()->paginate(10);
        $response['title'] = 'All Routes';

        return view('routes.index', $response);
    }

    public function create() {
        $response['title'] = 'Create Route';
        $response['vehicle_types'] = Vehicle::all();

        return view('routes.create', $response);
    }

    public function store(Request $request) {
        $request->validate( [
            'origin' => 'required',
            'destination' => 'required',
            'nodes' => 'required',
            'price' => 'required|numeric',
            'vehicle_id' => 'required|numeric|exists:vehicles,id',
            'distance' => 'numeric',
        ]);

        $response = Route::store($request->input());

        return back()->with($response['status'] ? 'success' : 'error', $response['message']);

    }

    public function edit(Route $route) {
        $response['route'] = $route;
        $response['title'] = $route->id. ' - Edit Route';
        $response['vehicle_types'] = Vehicle::all();

        return view('routes.edit', $response);
    }

    public function update(Request $request, Route $route) {
        $request->validate( [
            'origin' => 'required',
            'destination' => 'required',
            'nodes' => 'required',
            'price' => 'required|numeric',
            'vehicle_id' => 'required|numeric|exists:vehicles,id',
            'distance' => 'numeric',
        ]);

        $response = Route::updateRoute($route, $request->input());

        return back()->with($response['status'] ? 'success' : 'error', $response['message']);

    }

    public function destroy(Route $route) {
        $route->nodes()->delete();
        $route->delete();

        return response('Route and nodes deleted successfully');
    }
}
