<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest; 

class ProductController extends Controller
{
    // 商品一覧（自分の商品は除外）
    public function index()
    {
        $userId = Auth::id();

        $products = Product::query()
            ->when($userId, fn ($q) => $q->where('user_id', '!=', $userId))
            ->orderBy('id', 'asc')
            ->get();

        return view('front.products.index', compact('products'));
    }

    // 商品詳細
    public function show(Product $product)
    {
        $isFavorited = Auth::check()
            ? $product->isFavoritedBy(Auth::user())
            : false;

        return view('front.products.show', compact('product', 'isFavorited'));
    }

    // ★ 商品登録処理（新規追加）
    public function store(StoreProductRequest $request)
    {
        Product::create([
            'user_id'     => auth()->id(),
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
        ]);

        return redirect()->route('products.index');
    }
}