<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigManagement_controller extends Controller
{
    public function index()
    {
        return view('Config/index');
    }
}
