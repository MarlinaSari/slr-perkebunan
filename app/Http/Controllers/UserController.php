<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Method untuk menampilkan daftar user
    public function index()
    {
        // Ambil semua data user dari database
        $users = User::all();
        
        // Kirim data user ke view 'admin.users.index'
        return view('admin.users.index', compact('users'));
    }

    // Method untuk menampilkan form pembuatan user baru
    public function create()
    {
        return view('admin.users.create');
    }

    // Method untuk menyimpan user baru
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,user',
        ]);

        // Simpan data user ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Redirect ke halaman daftar user dengan pesan sukses
        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    // Method untuk menampilkan form edit user
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Method untuk memperbarui data user
    public function update(Request $request, User $user)
    {
       // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'role' => 'required|in:admin,user',
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    // Update user
    $user->name = $request->name;
    $user->email = $request->email;
    $user->role = $request->role;

    // Update password jika ada
    if ($request->password) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil diperbarui.');
}

    // Method untuk menghapus user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
