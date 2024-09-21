<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use App\Http\Requests\VendorRegistrationRequest;
use App\Http\Requests\VendorShopRegistrationRequest;
use App\Models\User;
use App\Models\Vendor;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{

    private $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }
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
        $newUser = $this->authService->createUser($request);

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
        $newUser = $this->authService->createUser($request, true);

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
        return view("auth.user.login");
    }

    public function checkUserLogin(Request $request)
    {
        $user = $this->authService->findByUsername($request);

        if($user === null){
            return redirect()->back()->withErrors(["user" => "Not Found"]);
        }
        $authenticated = Hash::check($request->password, $user->password);

        if (!$authenticated){
            return redirect()->back()->withErrors(["user" => "Not Found"]);
        }
        return redirect(route("home.home", ["user" => $user]));

    }
    public function loginVendor()
    {
        return view("auth.vendor.login");
    }

    public function checkVendorLogin(Request $request)
    {
        $vendorUser = $this->authService->findByEmail($request);

        if($vendorUser === null){
            return redirect()->back()->withErrors(["user" => "Not Found"]);
        }
        $authenticated = Hash::check($request->password, $vendorUser->password);

        if (!$authenticated){
            return redirect()->back()->withErrors(["user" => "Not Found"]);
        }

        $vendor = Vendor::where(["user_id" => $vendorUser->id])->first();

        return redirect(route("home.vendor", ['vendor' => $vendor]));

    }


}
