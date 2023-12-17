<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Auth_service
{
    public function login(string $email, string $password): bool
    {
        $credentials = ['email' => $email, 'password' => $password];

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            return true;
        }

        return false;
    }
}
