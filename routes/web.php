<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)
    ->name("home.")
    ->group(function (){
        Route::get("/", "index")->name("main");
        Route::get("/guest", "guest")->name("guest");

        Route::get("/authenticateGuest/{id}", "authGuest")->name("guest.auth");


});
