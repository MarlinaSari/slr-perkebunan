<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Redirect to dashboard based on user role.
     */
    protected function redirectTo()
    {
        // Jika user adalah admin, arahkan ke dashboard admin
        if (Auth::user()->role == 'admin') {
            return '/admin/dashboard'; // arahkan admin ke /admin/dashboard
        }

        // Jika user biasa, arahkan ke dashboard user
        return '/user/dashboard'; // arahkan user biasa ke /dashboard
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    
}
