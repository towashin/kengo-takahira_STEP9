<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyProductController extends Controller
{
    /**
     * 自分の出品商品一覧
     */
    public function index()
    {
        $products = Product::where('user_id', Auth::id())
            ->orderBy('id', 'asc')
            ->get();

        return view('front.my_products.index', compact('products'));
    }

    /**
     * 出品商品詳細
     */
    public function show(Product $product)
    {
        $this->authorizeProduct($product);

        return view('front.my_products.show', compact('product'));
    }

    /**
     * 編集画面
     */
    public function edit(Product $product)
    {
        $this->authorizeProduct($product);

        return view('front.my_products.edit', compact('product'));
    }

    /**
     * 更新処理
     */
    public function update(Request $request, Product $product)
    {
        $this->authorizeProduct($product);

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|integer|min:0',
            'description' => 'nullable|string',
            'stock'       => 'required|integer|min:0',
        ]);

        $product->update($validated);

        return redirect()
            ->route('my.products.show', $product)
            ->with('success', '商品を更新しました');
    }

    /**
     * 削除
     */
    public function destroy(Product $product)
    {
        $this->authorizeProduct($product);

        $product->delete();

        return redirect()
            ->route('my.products.index')
            ->with('success', '商品を削除しました');
    }

    /**
     * 共通の所有者チェック
     */
    private function authorizeProduct(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'アクセス権がありません');
        }
    }
}