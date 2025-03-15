<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) { // Cek apakah user sudah login
                $user = Auth::user(); // Ambil data user
                $directUser = User::where('id', $user->id)->select('name', 'email', 'type')->first();
                $view->with('globalUser', $directUser);
            } else {
                $view->with('globalUser', null); // Set default null jika tidak ada user
            }
        });
    }
}
