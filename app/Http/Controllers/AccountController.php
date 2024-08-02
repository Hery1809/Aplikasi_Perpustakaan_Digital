<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function edit()
    {
        return view('account.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->hasFile('profile_picture')) {
            // Hapus gambar lama jika ada
            if ($user->profile_picture && $user->profile_picture !== 'images/blank_picture.jpg') {
                Storage::delete('public/' . $user->profile_picture);
            }

            $image = $request->file('profile_picture');
            $imagePath = $image->store('profile_pictures', 'public');
            $user->profile_picture = $imagePath;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
