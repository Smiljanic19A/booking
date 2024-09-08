<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
});
Route::controller(AuthController::class)
    ->name("auth.")
    ->prefix("/auth")
    ->group(function (){
        //User Auth Routes
        Route::get("/user", "userIndex")->name("user");
        Route::post("/user/register", "registerUser")->name("user.register");

        Route::get("/vendor", "vendorRegistration")->name("vendor");
        Route::post("/vendor/register", "registerVendorUser")->name("vendor.user");
        Route::post("/vendor/register/information", "registerVendorInformation")->name("vendor.register");

    });

