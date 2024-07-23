<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    // Menampilkan halaman profil
    public function show()
    {
        return view('profile');
    }

    // Memperbarui profil pengguna
    public function update(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        // Mendapatkan pengguna yang sedang masuk
        $user = Auth::user();

        // Memperbarui data pengguna
        $user->name = $request->name;
        $user->email = $request->email;

        // Menyimpan perubahan
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
