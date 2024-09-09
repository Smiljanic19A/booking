<?php

namespace App\Services;
use App\Http\Requests\UserRegistrationRequest;
use App\Http\Requests\VendorRegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

}
