<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User_controller extends Controller
{
    public function index()
    {
        $data['listUser'] = User::all();
        $data['active'] = 'user';

        return view('/User/index', $data);
    }
}
