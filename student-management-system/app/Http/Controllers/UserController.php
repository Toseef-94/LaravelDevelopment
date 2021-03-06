<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
        public $successStatus = 200;
        public function register(request $request) 
        {
        $validator = Validator::make($request->all(), 
        [ 
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',  
        ]);   
        if ($validator->fails()) {          
        return response()->json(['error'=>$validator->errors()], 401);                        }    
        $input = $request->all();  
        $input['password'] = bcrypt($input['password']);
        $input['remember_token'] = Str::random(60);
        $user = User::create($input); 
        return response()->json(['user'=>$user], $this->successStatus);

        }

        public function login(request $request) 
    {
 
// validate the info, create rules for the inputs
$rules = array(
    'email'    => 'required|email', // make sure the email is an actual email
    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
);

// run the validation rules on the inputs from the form
$validator = Validator::make(Input::all(), $rules);

    $userdata = array(
        // 'name'     => Input::get('name'),
        'email'     => Input::get('email'),
        'password'  => Input::get('password')
    );

    // attempt to do the login
    if (Auth::attempt($userdata)) {

$respone = ['status'=>200,
'success'=>'Successfully loged in',
'token'=>Auth::user()->remember_token,
'user' => $userdata];

return json_encode($respone);
 // return response()->json(['data' => ['logged_in' => true, 'status'=> "created" , 'user' => $userdata]]);
    //  echo "Successfully Login!!";
    } else {        
     $respone = ['status'=>500,
    'error'=>'Invalid credtials'];
      return json_encode($respone);
    }
 
   
 
}
}