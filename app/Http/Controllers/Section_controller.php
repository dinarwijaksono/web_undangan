<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Section_controller extends Controller
{
    public function index()
    {
        Log::info("path /Section success", [
            'user_id' => auth()->user()->id,
            'email' => auth()->user()->email,
            'class' => 'Section_controller',
            'user_agent' => $_SERVER['HTTP_USER_AGENT']
        ]);

        $data['active'] = 'section';

        return view("/Section/index", $data);
    }
}
