<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        // ログインユーザーのみ商品登録可能
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => '商品名は必須です。',
            'price.required' => '価格を入力してください。',
            'stock.required' => '在庫数を入力してください。',
        ];
    }
}