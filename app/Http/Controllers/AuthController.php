<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function userIndex()
    {
        return view("auth.user.registration");
    }

    public function registerUser(UserRegistrationRequest $request)
    {
        //check if the passwords match
        if (trim($request->password) !== trim($request->confirm_password)){
            return redirect()->back()->withErrors(['password' => 'Passwords Do Not Match!']);
        }
        //create the user
        $newUser = User::create([
            "username" => $request->username,
            "password" => Hash::make($request->password),
            "email" => $request->email
        ]);
        if($newUser === null){
            dd("Kurac nesto puklo... Napravi error page!!!"); //TODO: make an error page
        }
        session()->push("username", $request->username);

        return redirect(route("home.home", ["user" => $newUser]));
    }
    /*
     *Vendor Routes:
     */
    public function vendorRegistration()
    {
        return view("auth.vendor.registration");
    }
    public function registerVendorUser()
    {
        return redirect()->back()->with("vendor_user_registered", true);
    }

    public function registerVendorInformation()
    {
        return redirect()->back()->with("vendor_user_registered", true);
    }
}
