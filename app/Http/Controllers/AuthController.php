<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function userIndex()
    {
        return view("auth.user.registration");
    }

    public function registerUser()
    {
        
    }
}
