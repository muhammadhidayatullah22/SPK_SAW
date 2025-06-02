<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

Class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $user = User::find($request->user()->id);
        return view('profile.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->user()->id);
        $user->update($request->all());
        return redirect()->route('profile.profile')->with('success', 'Profile updated successfully');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    
        $user = User::find($request->user()->id);
    
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->route('profile.profile')->with('error', 'Kata sandi lama tidak sesuai');
        }
    
        $user->password = Hash::make($request->password);
        $user->save();
    
        return redirect()->route('profile.profile')->with('success', 'Password berhasil diubah');
    }
    

}

