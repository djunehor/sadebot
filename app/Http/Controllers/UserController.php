<?php

namespace App\Http\Controllers;

use App\ActivityLogModel;
use App\AppModel;
use App\EventModel;
use App\Http\Middleware\UserAuthentication;
use App\TransactionModel;
use App\User;
use App\UserModel;
use App\UtilitiesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function dashboard() {
        $response['title'] = 'Dashboard';
        $response['status'] = true;
        $response['events'] = EventModel::allUserEvents(['id' => Auth::user()->id]);

        Log::info('EVENT DATA: ' .json_encode($response));

        return view('events', $response);
    }

    public function doLogin(Request $request)
    {
        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:8' // password can only be alphanumeric and has to be greater than 3 characters
        );

// run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

// if the validator fails, redirect back to the form
        if ($validator->fails()) {
            $response['status'] = false;
            $response['error'] = implode("<br>", $validator->messages()->all());

        } else {

            // create our user data for the authentication
            $user = [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ];

            // attempt to do the login
            if (auth()->attempt($user)) {

                $response['status'] = true;
                $response['message'] = 'Login successful';
                $response['url'] = 'user/';

            } else {
                $response['status'] = false;
                $response['error'] = 'Login Failed';

            }

        }

        return $response;
    }

    public function showRegister() {
        $response['title'] = 'Register';
        $response['status'] = true;

        return view('register', $response);
    }

    public function doRegister(Request $request)
    {
        $rules = array(
            'name' => 'required|unique:users,name|min:4', // make sure the email is an actual email
            'email' => 'required|email|unique:users,email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:8' // password can only be alphanumeric and has to be greater than 3 characters
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $response['status'] = false;
            $response['error'] = implode("", $validator->messages()->all());

            return $response;
        } else {

            $create = UserModel::insert($request);

            // create our user data for the authentication
            $userdata = array(
                'email' => $request->input('email'),
                'password' => $request->input('password')
            );

            // validation successful!
            // redirect them to the secure section or whatever
            $response['status'] = true;
            $response['message'] = 'Registration Successful. You can login now';

            return $response;

        }
    }

    public function showLogin() {
        $response['title'] = 'Login';
        $response['status'] = true;

        return view('login', $response);
    }

    public function doLogout()
    {
        auth()->logout(); // log the user out of our application
        return redirect('login'); // redirect the user to the login screen
    }

    public function index(Request $request)
    {
        $limit = $request->input('limit');
        $offset = $request->input('offset');
        $filterParams = $request->query();
        $data = UserModel::allUsers($limit, $offset, $filterParams);

        return response()->json($data, $data['code']);
    }

    public function allActive(Request $request)
    {
        $limit = $request->input('limit');
        $offset = $request->input('offset');
        $filterParams = $request->query();
        $filterParams['status'] = UserModel::USER_STATUS_ACTIVE;
        $data = UserModel::allUsers($limit, $offset, $filterParams);

        //activity log before response is returned

        $action = "viewed all active users";

        ActivityLogModel::newAction($request, $action, $data);
        return response()->json($data, $data['code']);
    }

    public function allUnverified(Request $request)
    {
        $limit = $request->input('limit');
        $offset = $request->input('offset');
        $filterParams = $request->query();
        $filterParams['status'] = UserModel::USER_STATUS_UNVERIFIED;
        $data = UserModel::allUsers($limit, $offset, $filterParams);

        //activity log before response is returned

        $action = "viewed all unverified  users";

        ActivityLogModel::newAction($request, $action, $data);
        return response()->json($data, $data['code']);
    }

    public function allCustomers(Request $request)
    {
        $limit = $request->input('limit');
        $offset = $request->input('offset');
        $filterParams = $request->query();
        $filterParams['status'] = UserModel::USER_STATUS_UNVERIFIED;
        $filterParams['role'] = 1;
        $data = UserModel::allUsers($limit, $offset, $filterParams);

        //activity log before response is returned

        $action = "viewed all customers";

        ActivityLogModel::newAction($request, $action, $data);
        return response()->json($data, $data['code']);
    }


    public function login(Request $request)
    {
        //validate
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        Log::info('USER DATA ' . json_encode($request->all()));

        if ($validator->fails()) {
            $response['code'] = STATUS_VALIDATION_FAILED;
            $response['status'] = false;
            $response['error'] = implode("", $validator->messages()->all());

            $action = "attempted to login";
            ActivityLogModel::newAction($request, $action, $response);

            return response()->json($response, $response['code']);
        }

        //save
        $save = UserModel::startSession($request->input('email'), $request->input('password'));

        $action = "new login";

        ActivityLogModel::newAction($request, $action, $save);

        return response()->json($save, $save['code']);
    }

    public function store(Request $request)
    {
        //validate
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'role' => 'required',
        ]);

        Log::info('USER DATA ' . json_encode($request->all()));

        if ($validator->fails()) {
            $response['code'] = STATUS_VALIDATION_FAILED;
            $response['status'] = false;
            $response['error'] = implode("", $validator->messages()->all());

            $action = "attempted to create account";
            ActivityLogModel::newAction($request, $action, $response);

            return response()->json($response, $response['code']);
        }

        //save
        $save = UserModel::insert($request->input());

        $action = "new user created";

        ActivityLogModel::newAction($request, $action, $save);

        return response()->json($save, $save['code']);
    }

    public function show(Request $request)
    {
        $idUser = UserAuthentication::getIdUser();
        $response['code'] = STATUS_SUCCESS;
        $response['status'] = true;
        $response['data'] = UserModel::single($idUser);

        $action = "viewed user profile [" . $idUser . "]";

        ActivityLogModel::newAction($request, $action, $response);
        return response()->json($response, $response['code']);
    }

    public function update(Request $request)
    {

        $id = UserAuthentication::getIdUser();
        $save = UserModel::edit($id, $request->input());

        $action = "account updated";

        ActivityLogModel::newAction($request, $action, $save);

        return response()->json($save, $save['code']);
    }

    public function destroy(Request $request, $id)
    {
        //
        $delete = UserModel::removeUser($id);

        $action = "deleted user [". $id . "]";

        ActivityLogModel::newAction($request, $action, $delete);
        return response()->json($delete, $delete['code']);
    }

    public function userEligible(Request $request, $id)
    {
        //
        $eligibilityStatus = UserModel::checkEligibility($id);

        $action = "check if user [" . $id . "] is eligible";

        ActivityLogModel::newAction($request, $action, $eligibilityStatus);
        return response()->json($eligibilityStatus, $eligibilityStatus['code']);
    }

    public function userLoggedIn(Request $request, $id)
    {
        $eligibilityStatus = UserModel::checkLoggedIn($id);

        $action = "checked if user [" . $id . "] is logged in";

        ActivityLogModel::newAction($request, $action, [$eligibilityStatus, 'status' => true]);
        return response()->json($eligibilityStatus, 200);
    }

    public function transactions(Request $request)
    {
        $idUser = UserAuthentication::getIdUser();
        $limit = $request->input('limit');
        $offset = $request->input('offset');

        $response['status'] = true;
        $response['code'] = 200;
        $response['data'] = TransactionModel::allTransactions($limit, $offset, ['id' => $idUser]);

        //activity log before response is returned

        $action = "viewed all users transactions";

        ActivityLogModel::newAction($request, $action, $response);
        return response()->json($response, $response['code']);
    }

    public function activities(Request $request)
    {
        $idUser = UserAuthentication::getIdUser();
        $idString = UtilitiesModel::getIdString($idUser, UserModel::TABLE);
        $limit = $request->input('limit');
        $offset = $request->input('offset');
        $data = ActivityLogModel::allActivities($limit, $offset, ['id' => $idString]);

        //activity log before response is returned

        $action = "viewed all user activities";

        ActivityLogModel::newAction($request, $action, $data);

        return response()->json($data, 200);
    }
}
