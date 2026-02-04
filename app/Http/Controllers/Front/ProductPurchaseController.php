<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        // 在庫0チェック（二重安全）
        if ($product->stock <= 0) {
            return back()->withErrors([
                'quantity' => '在庫がありません。',
            ]);
        }

        DB::transaction(function () use ($request, $product) {

            // ① 購入履歴を保存
            Purchase::create([
                'user_id'    => Auth::id(),
                'product_id' => $product->id,
                'price'      => $product->price,   // 購入時価格を保存
                'quantity'   => $request->quantity,
            ]);

            // ② 在庫を減らす
            $product->decrement('stock', $request->quantity);
        });

        return redirect()
            ->route('products.show', $product->id)
            ->with('success', '購入が完了しました');
    }
}