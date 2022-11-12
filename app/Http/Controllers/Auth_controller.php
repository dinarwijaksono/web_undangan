<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\User_service;

use function PHPUnit\Framework\isFalse;
use function PHPUnit\Framework\isTrue;

class Auth_controller extends Controller
{
    private $user_service;

    function __construct(User_service $user_service)
    {
        $this->user_service = $user_service;
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

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/Dashboard');
        }

        return back()->with('loginFailed', 'Email / password salah.');
    }






    public function register()
    {
        return view('/Auth/register');
    }


    public function doRegister(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'register_code' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        $code = $this->user_service->getRegisterCode();
        if ($code !== $request->register_code) {
            return back()->with('registerFailed', 'Kode register tidak cocok.')->withInput();
        }

        $register = $this->user_service->register($request->email, $request->password);

        if ($register == false) {
            return back()->with('registerFailed', 'Email sudah di gunakan.')->withInput();
        }

        return back()->with('registerSuccess', 'Register berhasil.');
    }






    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/Login');
    }
}
