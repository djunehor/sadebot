<?php

namespace App;

use App\Http\Middleware\UserAuthentication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserModel extends Model
{
    public const TABLE = 'users';
    public const TOKEN_TABLE = 'auth_tokens';
    public const LGA_TABLE = 'lgas';
    public const STATE_TABLE = 'states';
    public const COUNTRY_TABLE = 'countries';
    public const DEFAULT_LIMIT = 1000;
    public const DEFAULT_ROLE = 'USER';
    public const ROLE_MERCHANT = 'MERCHANT';
    public const ROLE_ADMIN = 'ADMIN';
    public const ROLE_SUPERADMIN = 'SUPERADMIN';
    public const DEFAULT_GENDERS = ['male', 'female', 'undecided'];
    public const USER_STATUS_UNVERIFIED = 0;
    public const USER_STATUS_ACTIVE = 1;
    public const COLUMNS = [self::TABLE.'.id_string as id', 'username', 'email',
        'first_name', 'last_name', 'middle_name'];
    public const DEFAULT_TOKEN_EXPIRY_IN_MINUTES = 15;

    /**This method helps to retrieve
     * and also filter all users
     * @param int $limit
     * @param null $offset
     * @param array $filterParams
     * @param bool $returnId
     * @return mixed
     */
    public static function allUsers($limit = self::DEFAULT_LIMIT, $offset = null, $filterParams = [], $returnId = false) {

        $users = DB::table(self::TABLE);

        if($limit > 0 )
            $users->limit($limit);

        if($offset > 0 && $offset < $limit)
            $users->offset($offset);

        if(!empty($filterParams)) {
            $recordIds = self::filterUsers($filterParams);
            $users->whereIn(UserModel::TABLE . '.id', $recordIds);
        }

        $columns = self::COLUMNS;

        if($returnId)
            $columns[] = 'id';

        $data = $users->where(UserModel::TABLE.'.abolished', false)
                ->where('id_role', '!=', 4)
                ->join(RoleModel::TABLE, RoleModel::TABLE.'.id', '=', UserModel::TABLE.'.id_role')
                ->get($columns)
                ->toArray();

        $response['status'] = true;
        $response['code'] = STATUS_SUCCESS;
        $response['data'] = $data;

        return $response;
    }

    public static function single($idString, $columns = self::COLUMNS) {

        $user = DB::table(self::TABLE)
                ->where(self::TABLE.'.id', $idString)
                ->where(self::TABLE.'.abolished', false)
                ->get($columns)->toArray();

        if(empty($user)) {
            return new \stdClass();
        }

        $userProfile = $user[0];

        return $userProfile;
    }

    /**
     * @param $data
     * @return mixed
     */
    public static function insert($data) {

        if(self::userExist($data)) {
            $response['status'] = false;
            $response['code'] = STATUS_BAD_REQUEST;
            $response['message'] = MESSAGE_RECORD_EXISTS;

            return $response;
        }

        $insertData = [];

        $userExist = DB::table(self::TABLE)
            ->where('email', $data['email'])
            ->where('abolished', false)
            ->count();

        if($userExist > 0)  {
            $response['status'] = false;
            $response['code'] = STATUS_DB_ERROR;
            $response['error'] = MESSAGE_RECORD_EXISTS;

            return $response;
        }

        $insertData['name'] = $data['name'];
        $insertData['email'] = $data['email'];
        $insertData['first_name'] = $data['first_name'];
        $insertData['last_name'] = $data['last_name'];
        $insertData['middle_name'] = array_key_exists('middle_name', $data) ? $data['middle_name'] : null;
        $insertData['password'] = Hash::make($data['password']);
        $insertData['id_string'] = strtoupper(str_random(10));

        $insert = DB::table(self::TABLE)
            ->insertGetId($insertData);

        if(!$insert) {
            $response['status'] = false;
            $response['error'] = MESSAGE_INTERNAL_ERROR;

            return $response;
        }


        $response['status'] = true;
        $response['message'] = MESSAGE_INSERT;

        return $response;
    }

    public static function removeUser($id) {

        $userId = UtilitiesModel::resolveIdString($id, self::TABLE);

        if(!$userId) {
            $response['status'] = false;
            $response['code'] = STATUS_NOT_FOUND;
            $response['error'] = MESSAGE_NOT_FOUND;

            return $response;
        }

        $delete['abolished'] = true;
        $delete['abolished_at'] = date('Y-m-d H:i:s');
        $delete['abolished_by'] = UserAuthentication::getIdUser();
        $delete = DB::table(self::TABLE)
            ->where('id', $userId)
            ->update($delete);

        if(!$delete) {
            $response['status'] = false;
            $response['code'] = STATUS_DB_ERROR;
            $response['error'] = MESSAGE_INTERNAL_ERROR;

            return $response;
        }

        $response['status'] = true;
        $response['code'] = STATUS_SUCCESS;
        $response['message'] = MESSAGE_DELETE;

        return $response;
    }

    public static function edit($id, $data) {

        if(array_key_exists('first_name', $data))
            $insertData['first_name'] = $data['first_name'];

        if(array_key_exists('last_name', $data))
            $insertData['last_name'] = $data['last_name'];

        if(array_key_exists('password', $data))
            $insertData['password'] = Hash::make($data['password']);

        if(array_key_exists('middle_name', $data))
            $insertData['middle_name'] = $data['middle_name'];

        if(!empty($insertData)) {
            $update = DB::table(self::TABLE)
                ->where('id', $id)
                ->update($insertData);
        }

        $response['status'] = true;
        $response['code'] = STATUS_SUCCESS;
        $response['message'] = MESSAGE_UPDATE;

        return $response;
    }

    /**
     * @param array $filterParams
     * @return array
     */
    public static function filterUsers(array $filterParams) : array {
        $details =  DB::table(self::TABLE);

        if(array_key_exists('id', $filterParams))
            $details = $details->where('id_string', $filterParams['id']);
        if(array_key_exists('gender', $filterParams))
            $details = $details->where('gender', $filterParams['gender']);
        if(array_key_exists('first_name', $filterParams))
            $details = $details->where('first_name', $filterParams['first_name']);
        if(array_key_exists('last_name', $filterParams))
            $details = $details->where('last_name', $filterParams['last_name']);
        if(array_key_exists('role', $filterParams))
            $details = $details->where('id_role', $filterParams['role']);
        if(array_key_exists('status', $filterParams))
            $details = $details->where('status', $filterParams['status']);

        $final = $details->get(['id'])->toArray();

        return !empty($final) ? (array) $final[0] : [];
    }

    public static function startSession($email, $password) {

        //$roleId = self::resolveRoleId($role);

        $user = DB::table(self::TABLE)
            ->where('email', $email)
            //->where('password', Hash::make($password))
            //->where('password', '$2y$10$3z172DbZmIA8EZXHArA70eL8vQFKXwL8SP39va9OGNAmHysU.osr2')
            //->where('role', $roleId)
            ->get(['id', 'password'])->toArray();

        if(empty($user)) {
            $response['status'] = false;
            $response['code'] = STATUS_NOT_FOUND;
            $response['error'] = MESSAGE_NOT_FOUND;

            return $response;
        }

        $userPassword = $user[0]->password;

        if(!Hash::check($password, $userPassword)) {
            $response['status'] = false;
            $response['code'] = STATUS_NOT_FOUND;
            $response['error'] = MESSAGE_NOT_FOUND;

            return $response;
        }

        $userId = $user[0]->id;

        $tokenCheck = DB::table(self::TOKEN_TABLE)
            ->where('id_user', $userId)
            //->where('expiry_date', '>', date('Y-m-d H:i:s'))
            ->limit(1)
            ->get(['token', 'expiry_date'])->toArray();

        if(empty($tokenCheck)) {
            $token = self::generateLoginToken($userId);

            if(!$token) {
                $response['status'] = true;
                $response['code'] = STATUS_FAILED;
                $response['error'] = MESSAGE_FAILED;

                return $response;
            }

            $response['status'] = true;
            $response['code'] = STATUS_SUCCESS;
            $response['message'] = MESSAGE_INSERT;
            $response['data'] = $token;

            return $response;
          }

        if($tokenCheck[0]->expiry_date < date('Y-m-d H:i:s')) {
            $tokenUpdate = self::updateLoginToken($userId);

            if (!$tokenUpdate) {
                $response['status'] = true;
                $response['code'] = STATUS_FAILED;
                $response['error'] = MESSAGE_FAILED;

                return $response;
            }
        }

            $response['status'] = true;
            $response['code'] = STATUS_SUCCESS;
            $response['message'] = MESSAGE_SUCCESS;
            $response['data'] = $tokenCheck[0]->token;

            return $response;
    }

    public static function checkEligibility($id, $role = self::DEFAULT_ROLE) {
        $user = DB::table(self::TABLE)
            ->where('id_string', $id)
            ->joinWhere(RoleModel::TABLE, $role, '=', 'id')
            ->get()->toArray();

        if(!$user) {
            $response['status'] = false;
            $response['code'] = STATUS_NOT_FOUND;
            $response['error'] = MESSAGE_NOT_FOUND;

            return $response;
        }

        $userProfile = $user[0];

        if(!$userProfile->status) {
            $response['status'] = false;
            $response['code'] = STATUS_NOT_AUTHORIZED;
            $response['error'] = MESSAGE_NOT_AUTHORIZED;

            return $response;
        }
    }

    public static function checkLoggedIn($token) {
        $user = DB::table(UserModel::TABLE)
            ->join(UserModel::TOKEN_TABLE, UserModel::TABLE.'.id', '=', UserModel::TOKEN_TABLE.'.id_user')
            ->where(UserModel::TOKEN_TABLE.'.token', $token)
            ->where(UserModel::TABLE.'.abolished', false)
            ->where(UserModel::TOKEN_TABLE.'.expiry_date', '>', date('Y-m-d H:i:s'))
            ->count();

        return ($user == 1) ? true : false;
    }

    public static function generateLoginToken($userId) {
        $insertData['id_user'] = $userId;
        $insertData['id_string'] = str_random(10);
        $insertData['token'] = str_random();
        $date = time() + (self::DEFAULT_TOKEN_EXPIRY_IN_MINUTES * 60);
        $insertData['expiry_date'] = date('Y-m-d H:i:s', $date);

        $insert = DB::table(self::TOKEN_TABLE)
            ->insert($insertData);

        return (!$insert) ? false : $insertData['token'];
    }

    public static function updateLoginToken($userId) {
        $insertData['token'] = str_random();
        $insertData['expiry_date'] = str_random();
        $date = time() + (self::DEFAULT_TOKEN_EXPIRY_IN_MINUTES * 60);
        $insertData['expiry_date'] = date('Y-m-d H:i:s', $date);

        $insert = DB::table(self::TOKEN_TABLE)
            ->where('id_user', $userId)
            ->update($insertData);

        return (!$insert) ? false : $insertData['token'];
    }

    public static function userExist($data) : bool {
            //DB::enableQueryLog();
            $exist = DB::Table(self::TABLE);

            if(array_key_exists('first_name', $data))
                $exist->where('first_name', $data['first_name']);

            if(array_key_exists('last_name', $data))
                $exist->where('last_name', $data['last_name']);

            if(array_key_exists('middle_name', $data))
                $exist->where('middle_name', $data['middle_name']);

            if(array_key_exists('email', $data))
                $exist->where('email', $data['email']);

            $count = $exist->count();
            //$laQuery = DB::getQueryLog();

            //Log::info(json_encode($laQuery[0]));

            return ($count > 0) ? true : false;

    }
}
