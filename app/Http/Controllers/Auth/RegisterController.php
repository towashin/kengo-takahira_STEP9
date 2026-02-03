<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'username'   => ['required', 'string', 'max:50', 'unique:users,username'],
            'name'       => ['required', 'string', 'max:100'],
            'name_kana'  => ['required', 'string', 'max:100'],
            'email'      => ['required', 'email', 'max:255', 'unique:users,email'],
            'password'   => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username'  => $validated['username'],
            'name'      => $validated['name'],
            'name_kana' => $validated['name_kana'],
            'email'     => $validated['email'],
            'password'  => Hash::make($validated['password']),
        ]);

        auth()->login($user);

        return redirect()->route('products.index');
    }
}
