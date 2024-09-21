<?php

namespace App\Services;
use App\Http\Requests\UserRegistrationRequest;
use App\Http\Requests\VendorRegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthService
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function createUser(UserRegistrationRequest|VendorRegistrationRequest $request, bool $isVendor = false)
    {
        // Prepare the base data array
        $data = [
            "username" => $request->username,
            "password" => Hash::make($request->password),
            "email" => $request->email,
        ];

        // Conditionally add the 'is_vendor' field
        if ($isVendor) {
            $data['is_vendor'] = true;
        }

        // Create the user and assign to $this->user if needed
        return $this->user = User::create($data);
    }

    public function findByUsername(Request $request)
    {
        return $this->user = User::where([
            "username" => $request->username
        ])->first();
    }

    public function findByEmail(Request $request)
    {
        return $this->user =  User::where([
            "email" => $request->email
        ])->first();
    }

}
