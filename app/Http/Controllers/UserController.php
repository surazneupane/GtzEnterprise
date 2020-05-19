<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
        public function store(Request $request)
    {
       $request->validate([

            'email'=>'unique:users',
            'mobileNumber'=>'unique:users',]);
 //setting role for vendor hardcoded as user is coming from the external sources and admin is hardcoded
User::create($request->all())->roles()->attach(2);//assigining role of vendor
return redirect('/vendor/signin')->with('message','Hello! New Vendor Login To Continue');
    }

public function logIn(Request $request)
{


    if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
{

      return $this->authorizedUser();
 }
else{

return redirect()->back()->with('ErrorMessage','Login Credentials Donot Match');
}

}

public function authorizedUser()
{

    if(Auth::user()->hasRole('Vendor'))
    {
 
        return redirect()->intended(route('vendordashboard'));

    }
    else if(Auth::user()->hasRole('Admin'))
    {

        return 'hello admin';
    }
    else
    {
 
     return abort(401);
    }
 
}

}
