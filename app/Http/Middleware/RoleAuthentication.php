<?php

namespace App\Http\Middleware;

use App\AuthenticationModel;
use App\Exceptions\UnauthorizedException;
use Closure;

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
            if (array_key_exists('HTTP_TOKEN', $_SERVER) || !AuthenticationModel::checkAuthorized($_SERVER['HTTP_TOKEN'], $role)) {

                return $next($request);
            }

        }
        return UnauthorizedException::forRoles($roles);
    }
}
