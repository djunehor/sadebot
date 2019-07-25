<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VehicleModel extends Model
{
    public const TABLE = 'vehicles';

    public function allVehicles() {
        $get = DB::table(self::TABLE)
            ->get();

        return $get;
    }
}
