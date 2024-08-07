<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function edit()
    {
        return view('account.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'current_password' => 'nullable|current_password',
            'password' => 'nullable|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update user data
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Update password if new one is provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Update profile picture if a new one is provided
        if ($request->hasFile('profile_picture')) {
            // Delete old picture if not the default
            if ($user->profile_picture && $user->profile_picture !== 'images/blank_picture.jpg') {
                Storage::delete('public/' . $user->profile_picture);
            }

            // Store new picture
            $file = $request->file('profile_picture');
            $path = $file->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        // Save changes
        $user->save();

        // Redirect with success message
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
