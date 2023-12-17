<?php

namespace App\Services;

use App\Domain\User_domain;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class User_service
{

    public function getRegisterCode(): string
    {
        $code = 'dinar wijaksono';

        return $code;
    }

    public function create(User_domain $userDomain): bool
    {
        try {

            DB::table('users')->insert([
                'role' => $userDomain->role,
                'username' => $userDomain->username,
                'email' => strtolower($userDomain->email),
                'password' => Hash::make($userDomain->password),
                'created_at' => round(microtime(true) * 1000),
                'updated_at' => round(microtime(true) * 1000),
            ]);

            Log::info('create user', [
                'username' => $userDomain->username,
                'email' => $userDomain->email,
                'status' => 'success'
            ]);

            return true;
        } catch (QueryException $th) {

            Log::info('create user', [
                'username' => $userDomain->username,
                'email' => $userDomain->email,
                'status' => 'failed',
                'exeption' => $th
            ]);

            return false;
        }
    }
}
