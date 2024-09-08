<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = "users";

    protected $fillable = ["username", "password", "email", "unique_id", "is_vendor", "is_admin"];

    public function isGuest()
    {
        $isGuest = false;
        if (session()->has("id")){
            $user = User::where(["id"=>session()->get("id")]);
            if ($user->unique_id !== null){
                $isGuest = true;
            }
        }
        return $isGuest;
    }
}
