<?php

namespace App\Http\Controllers;

use App\VehicleModel;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    private $vehicle;

    public function __construct()
    {
       $this->vehicle = new VehicleModel();
    }

    public function getAll() {

        return  $this->vehicle->allVehicles();
    }
}
