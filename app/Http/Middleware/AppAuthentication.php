<?php

namespace App\Http\Middleware;

use App\AppModel;
use App\AuthenticationModel;
use App\Exceptions\UnauthorizedException;
use Closure;
use Illuminate\Support\Facades\Route;

class AppAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @internal param $roles
     * @internal param $role
     */
    public function handle($request, Closure $next)
    {
        //let's check if app Id exists in DB

        if (!array_key_exists('HTTP_APP_ID', $_SERVER) || !AuthenticationModel::AppExist($_SERVER['HTTP_APP_ID'])) {
            return UnauthorizedException::forApp();
        }


        return $next($request);
    }
}
