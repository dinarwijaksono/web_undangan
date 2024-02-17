<?php

use App\Domain\User_domain;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Services\User_service;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('migrate:fresh-test', function () {
    config(['database.default' => 'mysql-test']);

    Artisan::call('migrate:fresh');

    $this->comment('migrate-test is successfull');
});


Artisan::command('install', function () {

    $userService = App::make(User_service::class);

    $getUser = User::select('*')->where('username', 'super admin')->get();

    if ($getUser->isEmpty()) {
        $user = new User_domain();
        $user->role = 0;
        $user->username = 'super admin';
        $user->email = env('EMAIL_SUPER_ADMIN');
        $user->password = env('PASSWORD_SUPER_ADMIN');

        $userService->create($user);

        Log::info('php artisan install', ['status' => 'success']);

        $this->comment("Username admin berhasil di buat, username: super admin , email: " . env('EMAIL_SUPER_ADMIN'));

        config('database.connections.mysql-test');

        $user = new User_domain();
        $user->role = 0;
        $user->username = 'super admin';
        $user->email = env('EMAIL_SUPER_ADMIN');
        $user->password = env('PASSWORD_SUPER_ADMIN');

        $userService->create($user);

        Log::info('php artisan install test', ['status' => 'success']);
    } else {

        Log::info('php artisan install', ['status' => 'failed', 'message' => 'username sudah ada.']);

        $this->comment('Username super admin sudah di buat sebelumnya');
    }
});
