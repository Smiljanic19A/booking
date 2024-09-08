<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use App\Http\Requests\VendorRegistrationRequest;
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
    public function registerVendorUser(VendorRegistrationRequest $request)
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

        return redirect()->back()->with([
            "vendor_user_registered" => true,
            "id" => $newUser->id
        ]);
    }

    public function registerVendorInformation()
    {
        return redirect()->back()->with("vendor_user_registered", true);
    }
}
