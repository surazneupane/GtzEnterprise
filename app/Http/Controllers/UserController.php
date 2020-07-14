<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use Socialite;

class UserController extends Controller
{
    public function store(Request $request)
    {
       $user=User::where('email',$request['email'])->first();
      
      if(!$user)
      {
        User::create($request->all())->roles()->attach(2); //assigining role of vendor
        
        return redirect('/vendor/signin')->with('message', 'Hello! New Vendor Login To Continue');
     }
            else{
            //if user has already a role of vendor
                 if($user->hasRole("Vendor"))
                {
                return redirect('/vendor/signup')->with('error', 'Sorry!Email Account Already Exists');
               
                }

                if($user->hasRole("Customer"))
                {

                    $user->roles()->attach(2);
                                    if($request['mobileNumber']!=null)
                                     {
                                        $user->mobileNumber=$request['mobileNumber'];
                                        $user->update();
                                    }
                 return redirect('/vendor/signin')->with('message', 'Hello! New Vendor Login To Continue');

                }
         }
      
     
        
    }

  
    public function logIn(Request $request)
    {


        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {

            return $this->authorizedUser();
        } else {

            return redirect()->back()->with('ErrorMessage', 'Login Credentials Donot Match');
        }
    }

    public function authorizedUser()
    {
       

        if (Auth::user()->hasRole('Vendor')) {

            return redirect()->intended(route('vendordashboard'));
        } else if (Auth::user()->hasRole('Admin')) {

            return redirect()->intended(route('admindashboard'));
        } else {

            return abort(401);
        }
    }

    

    //facebook 

    public function redirectToFacebook()
    {

        return Socialite::driver('facebook')->redirect();
    }

    public function handelFacebookCallback()
    {
        try {
            $getUser = Socialite::driver('facebook')->fields(['first_name', 'last_name', 'email'])->user();
            $returnedUser=$this->createUserFromFb($getUser);
            Auth::login($returnedUser);
             } catch (Exception $e) {


            return redirect(route('fblogin'));


        }

    }
public function createUserFromFb($getUser)
{
$user=User::where('email',$getUser['email'])->first();

//if a user with that email donot exists
if(!$user)
{
$user=User::create([
    'fname'     => $getUser['first_name'],
    'lname'    => $getUser['last_name'],
    'email' => $getUser['email'],
]);
$user->roles()->attach(3);
return $user;
}

//if user with that email exists
else
{

    //if the email have already a role of customer
    if($user->hasRole("Customer"))
    {
        return $user;
    }
    //if user donto have customer role but has vendr one
    if($user->hasRole("Vendor"))
    {

        $user->roles()->attach(3);
        return $user;
    }
    
}

}

}
