<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        return view("home.index");
    }

    public function guest()
    {
        return redirect()
            ->back()
            ->with("guestWarning", "This Is A Guest Warning!");
    }

    public function authGuest($id)
    {
        $guestUser = User::where([
            "unique_id" => $id
        ])->first();
        if ($guestUser === null){
            $guestUser = User::create([
                "unique_id"=>$id
            ]);
        }
        session::push('user_id', $guestUser->id);

        return view("home.home")->with('user', $guestUser);
    }
}
