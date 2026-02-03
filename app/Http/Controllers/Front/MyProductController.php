<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class MypageController extends Controller
{
    /**
     * マイページ表示
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // ログインユーザー以外はアクセス不可
        if (Auth::id() != $id) {
            abort(403, 'アクセス権がありません');
        }

        // ユーザー取得
        $user = User::findOrFail($id);

        // 将来的に出品商品一覧や購入履歴も渡せるように
        $products = Product::where('user_id', $id)->orderBy('id', 'asc')->get();

        return view('mypage.show', compact('user', 'products'));
    }
}