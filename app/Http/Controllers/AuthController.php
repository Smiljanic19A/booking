<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use App\Http\Requests\VendorRegistrationRequest;
use App\Http\Requests\VendorShopRegistrationRequest;
use App\Models\User;
use App\Models\Vendor;
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

    public function registerVendorInformation(VendorShopRegistrationRequest $request)
    {
        $params = $request->except("_token");
        $vendor = Vendor::create($params);
        if($vendor === null){
            dd("Kurac nesto puklo... Napravi error page!!!"); //TODO: make an error page
        }
        return redirect(route("home.vendor", ['vendor' => $vendor]));
    }

    public function loginUser()
    {
        dd("User Login Page");
    }
    public function loginVendor()
    {
        dd("Vendor Login Page");
    }


}
