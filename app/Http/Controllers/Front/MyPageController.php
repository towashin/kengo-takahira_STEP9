<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Purchase;

class MyPageController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 出品商品（商品番号昇順）
        $products = Product::where('user_id', $user->id)
            ->orderBy('id', 'asc')
            ->get();

        // 購入商品（購入日昇順）
        $purchases = Purchase::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('front.mypage.index', compact(
            'user',
            'products',
            'purchases'
        ));
    }
}