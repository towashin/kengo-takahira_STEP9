<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPurchaseController extends Controller
{
    public function create(Product $product)
    {
        return view('front.products.purchase', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        // バリデーション
        $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
                'max:' . $product->stock,
            ],
        ]);

        // 在庫が0なら購入不可（念のため）
        if ($product->stock <= 0) {
            return back()->withErrors([
                'quantity' => '在庫がありません。',
            ]);
        }

        // 在庫を減らす（※本来はトランザクションを使う）
        $product->decrement('stock', $request->quantity);

        return redirect()
            ->route('products.show', $product->id)
            ->with('success', '購入が完了しました');
    }
}
