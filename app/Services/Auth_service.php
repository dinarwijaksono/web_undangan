<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Auth_service
{
    public function login(string $email, string $password): bool
    {
        try {
            $credentials = ['email' => $email, 'password' => $password];

            if (Auth::attempt($credentials)) {
                session()->regenerate();

                Log::info('Login success', [
                    'email' => $email,
                    'class' => "Auth_service"
                ]);

                return true;
            }

            return false;
        } catch (\Throwable $th) {

            Log::info('Login failed', [
                'email' => $email,
                'class' => "Auth_service",
                'error_message' => $th->getMessage()
            ]);
        }
    }
}
