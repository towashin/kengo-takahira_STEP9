<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchaseRequest;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductPurchaseController extends Controller
{
    public function create(Product $product)
    {
        return view('front.products.purchase', compact('product'));
    }

    public function store(StorePurchaseRequest $request, Product $product)
    {
        DB::transaction(function () use ($request, $product) {

            // 在庫チェック（二重防止）
            if ($product->stock < $request->quantity) {
                abort(400, '在庫が不足しています');
            }

            // 購入履歴を保存
            Purchase::create([
                'user_id'    => Auth::id(),
                'product_id' => $product->id,
                'quantity'   => $request->quantity,
                'price'      => $product->price, // 購入時の価格を保存
            ]);

            // 在庫を減らす
            $product->decrement('stock', $request->quantity);
        });

        return redirect()
            ->route('products.show', $product->id)
            ->with('success', '購入が完了しました');
    }
}