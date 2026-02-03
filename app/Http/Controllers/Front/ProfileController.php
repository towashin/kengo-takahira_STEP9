<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        return view('front.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'name'     => 'required|string|max:255',
            'kana'     => 'required|string|max:255',
        ]);

        $user->update([
            'username' => $request->username,
            'email'    => $request->email,
            'name'     => $request->name,
            'kana'     => $request->kana,
        ]);

        return redirect()
            ->route('mypage.index')
            ->with('success', 'アカウント情報を更新しました');
    }
}