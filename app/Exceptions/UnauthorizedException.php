<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class UnauthorizedException extends HttpException
{
    private $requiredRoles = [];

    private $requiredPermissions = [];

    public static function forRoles(array $roles)
    {
        $message = 'User does not have the right roles.';

        $permStr = implode(', ', $roles);
        $message .= ' Necessary roles are '.strtoupper($permStr);

        $response['status'] = false;
        $response['code'] = 405;
        $response['error'] = $message;
        return response()->json($response, $response['code']);
    }

    public static function forPermissions(array $permissions)
    {
        $message = 'User not authorized.';

        if (config('permission.display_permission_in_exception')) {
            $permStr = implode(', ', $permissions);
            $message .= ' Necessary permissions are '. strtoupper($permStr);
        }

        $response['status'] = false;
        $response['code'] = 406;
        $response['error'] = $message;
        $response['data'] = $_SERVER;

        return response()->json($response, $response['code']);
    }

    public static function notLoggedIn()
    {
        $response['status'] = false;
        $response['code'] = 407;
        $response['error'] = MESSAGE_NOT_AUTHORIZED.". Not Logged in.";
        return response()->json($response, $response['code']);
    }

    public static function forApp($message = MESSAGE_NOT_AUTHORIZED)
    {
        $response['status'] = false;
        $response['code'] = 408;
        $response['error'] = $message. ". Unrecognized app.";
        return response()->json($response, $response['code']);
    }

    public function getRequiredRoles()
    {
        return $this->requiredRoles;
    }

    public function getRequiredPermissions()
    {
        return $this->requiredPermissions;
    }
}
