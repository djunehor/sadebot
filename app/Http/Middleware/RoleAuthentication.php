<?php

namespace App\Http\Middleware;

use App\AuthenticationModel;
use App\Exceptions\UnauthorizedException;
use App\User;
use Closure;
use Illuminate\Support\Facades\DB;

class RoleAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param array $roles
     * @return mixed
     * @internal param $role
     * @internal param $token
     */
    public function handle($request, Closure $next, ... $roles)
    {

        foreach($roles as $role) {
            if (array_key_exists('HTTP_TOKEN', $_SERVER) || !$this->checkAuthorized($_SERVER['HTTP_TOKEN'], $role)) {

                return $next($request);
            }

        }
        return UnauthorizedException::forRoles($roles);
    }

    private function checkAuthorized($token, $role) {

        $select = User::query()
            ->join('auth_tokens', 'auth_tokens.id_user', '=', 'users.id')
            ->join('roles', 'users.id_role', '=', 'roles.id')
            ->where('auth_tokens.token', $token)
            ->where('roles.name', strtoupper($role))
            ->where('users.abolished', false)
            ->count();

        return ($select == 1 ) ? true : false;
    }
}
