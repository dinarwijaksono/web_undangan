<?php

namespace App\Http\Livewire;

use App\Domain\User_domain;
use App\Services\User_service;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class FormRegister extends Component
{
    public $username;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        "username" => 'required|min:4',
        'email' => 'required|unique:users,email',
        'password' => 'required|min:4',
        "password_confirmation" => 'required|same:password'
    ];

    protected $userService;

    public function booted()
    {
        $this->userService = App::make(User_service::class);
    }

    public function doRegister()
    {
        $this->validate();

        try {
            $user = new User_domain();
            $user->role = 1;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password = $this->password;

            $this->userService->create($user);

            return redirect('/Login');

            Log::info('do register success', [
                'class' => "Auth_controller",
                "username" => $this->username,
                "email" => $this->email,
                'user_agent' => $_SERVER['HTTP_USER_AGENT']
            ]);
        } catch (\Throwable $th) {
            Log::error('do register failed', [
                'class' => "App\Http\Controller\Auth_controller",
                "username" => $this->username,
                "email" => $this->email,
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                "message_error" => $th->getMessage()
            ]);

            session()->flash("registerFailed", "Register gagal.");
        }
    }

    public function render()
    {
        return view('livewire.form-register');
    }
}
