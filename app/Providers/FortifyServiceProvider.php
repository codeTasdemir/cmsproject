<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Fortify\Contracts\ResetsUserPasswords;
use App\Actions\Fortify\ResetUserPassword;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Redirect;


class FortifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        //test ortamı için RateLimiter'ı kapatıyoruz
        if (app()->environment('testing')) {
            RateLimiter::for('login', function (Request $request) {
                return Limit::none(); // Rate limit kapalı
            });
        }

        Fortify::loginView(function () {
            return view('admin.auth.login');
        });

        Fortify::registerView(function () {
            $this->app->bind(ResetsUserPasswords::class, ResetUserPassword::class);
            return view('admin.auth.register');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('admin.auth.forgot-password');
        });

        Fortify::resetPasswordView(function ($request) {
            return view('admin.auth.reset-password', ['request' => $request]);
        });

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }
        });

    }
}
