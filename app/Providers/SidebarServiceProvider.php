<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;

class SidebarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Membuat view composer untuk sidebar
        View::composer('layouts.app', function ($view) {
            // Mengambil semua data user dari database
            $users = User::all();
            // Mengirim data user ke view
            $view->with('users', $users);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
