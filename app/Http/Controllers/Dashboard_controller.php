<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Dashboard_controller extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 0) {
            return redirect('/User/index');
        }

        Log::info("path /Dashboard", [
            "user_id" => auth()->user()->id,
            "class" => "Dashboard_controller",
            'email' => auth()->user()->email,
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        ]);

        return view('Dashboard/index', ['active' => 'dashboard']);
    }
}
