<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AuthenticationModel extends Model
{
    public static function AppExist($appId) {
        $select = DB::Table('auth_apps')
            ->where('name', strtolower($appId))
            ->where('abolished', false)
            ->count();

        return ($select == 1 ) ? true : false;
    }

    public static function checkAuthorized($token, $role) {

        $select = DB::Table(UserModel::TABLE)
            ->join(UserModel::TOKEN_TABLE, UserModel::TOKEN_TABLE.'.id_user', '=', UserModel::TABLE.'.id')
            ->join('roles', UserModel::TABLE.'.id_role', '=', 'roles.id')
            ->where(UserModel::TOKEN_TABLE.'.token', $token)
            ->where('roles.name', strtoupper($role))
            ->where(UserModel::TABLE.'.abolished', false)
            ->count();

        return ($select == 1 ) ? true : false;
    }
}
