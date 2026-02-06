<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest; 

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        return view('front.profile.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        auth()->user()->update($request->validated());

        return redirect()
            ->route('mypage.index')
            ->with('success', 'プロフィールを更新しました');
    }
}