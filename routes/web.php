<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VendorEditController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)
    ->name("home.")
    ->group(function (){
        Route::get("/", "index")->name("main");
        //Guest Authentication Routes:
        Route::get("/guest", "guest")->name("guest");
        Route::get("/authenticateGuest/{id}", "authGuest")->name("guest.auth");
        //User Authentication Routes
        Route::get("/home/{user}", "pushToHome")->name("home");
        Route::get("/home/vendor/{vendor}", "pushToVendor")->name("vendor");

    });
Route::controller(AuthController::class)
    ->name("auth.")
    ->prefix("/auth")
    ->group(function (){
        //User Registration Auth Routes
        Route::get("/user", "userIndex")->name("user"); //show user registration page
        Route::post("/user/register", "registerUser")->name("user.register");
        //Vendor Registration
        Route::get("/vendor", "vendorRegistration")->name("vendor"); //show vendor registration page
        Route::post("/vendor/register", "registerVendorUser")->name("vendor.user");
        Route::post("/vendor/register/information", "registerVendorInformation")->name("vendor.register");
        //User Login Auth Routes
        Route::get("/user/login", "loginUser")->name("user.login");
        Route::post("/user/login/check", "checkUserLogin")->name("user.login.check");
        //Vendor Login Auth Routes
        Route::get("/vendor/login", "loginVendor")->name("vendor.login");
        Route::post("/user/login/check", "checkVendorLogin")->name("vendor.login.check");
    });
Route::controller(VendorController::class)
    ->name("setup.")
    ->prefix("/setup")
    ->group(function (){
        Route::get("/{page}/{vendor}", "pushToXSetup")->name("page"); //setup.page

        Route::post("/service", "addService")->name("service"); //setup.service
        Route::post("/service/delete", "deleteService")->name("service.delete"); //setup.service.delete
    });
Route::controller(VendorEditController::class)
    ->name("edit.")
    ->prefix("/edit")
    ->group(function (){
       Route::get("/service", "serviceEditIndex")
           ->name("service");
    });

