<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('auth.passwords.change');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (Hash::check($request->current_password, Auth::user()->password)) {
            Auth::user()->update(['password' => Hash::make($request->new_password)]);

            // Kirim notifikasi atau pesan sukses
            return redirect()->route('dashboard')->with('status', 'Password changed successfully!');
        }

        return back()->withErrors(['current_password' => 'Current password does not match']);
    }
}

