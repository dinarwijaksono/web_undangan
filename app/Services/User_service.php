<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User_service
{

    public function getRegisterCode(): string
    {
        $code = 'dinar wijaksono';

        return $code;
    }

    public function register($email, $password): bool
    {
        $email = strtolower($email);

        $user = DB::table('users')
            ->select('email')
            ->where('email', $email)
            ->first();

        $user = collect($user);
        if ($user->isNotEmpty()) {
            return false;
        }

        DB::table('users')->insert([
            'email' => $email,
            'password' => Hash::make($password),
            'created_at' => round(microtime(true) * 1000),
            'updated_at' => round(microtime(true) * 1000),
        ]);

        return true;
    }
}
