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
    public function register(request $request) 
    {
    return User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
        'remember_token' => Str::random(60),
    ]);
   
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

// if the validator fails, redirect back to the form
if ($validator->fails()) {
    return Redirect::to('login')
        ->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
} else {
    $userdata = array(
        // 'name'     => Input::get('name'),
        'email'     => Input::get('email'),
        'password'  => Input::get('password')
    );

    // attempt to do the login
    if (Auth::attempt($userdata)) {

$respone = ['status'=>200,
'msg'=>'Successfully loged in',
'token'=>Auth::user()->remember_token,
'user' => $userdata];

return json_encode($respone);
 // return response()->json(['data' => ['logged_in' => true, 'status'=> "created" , 'user' => $userdata]]);
    //  echo "Successfully Login!!";
    } else {        
     $respone = ['status'=>500,
    'msg'=>'Invalid credtials'];
      return json_encode($respone);
    }

}
   
 
}
}