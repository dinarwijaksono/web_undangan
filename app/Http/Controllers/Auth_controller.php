<?php

namespace App\Http\Controllers;

use App\Services\Auth_service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\User_service;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isFalse;
use function PHPUnit\Framework\isTrue;

class Auth_controller extends Controller
{
    private $user_service;
    private $authService;

    function __construct(User_service $user_service, Auth_service $authService)
    {
        $this->user_service = $user_service;
        $this->authService = $authService;
    }




    public function login()
    {
        return view('Auth/login');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $login = $this->authService->login($request->email, $request->password);

        if ($login) {
            return redirect('/Dashboard');
        } else {
            return back()->with('loginFailed', 'Email / password salah.');
        }
    }






    public function register()
    {
        Log::info("path /Auth/register success", [
            'class' => "Auth_controller",
            'user_agent' => $_SERVER['HTTP_USER_AGENT']
        ]);

        return view('/Auth/register');
    }









    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/Login');
    }
}
