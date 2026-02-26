<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseRequest extends FormRequest
{
    /**
     * 認可（購入できるか）
     */
    public function authorize(): bool
    {
        // ログインしているユーザーのみ購入可能
        return auth()->check();
    }

    /**
     * バリデーションルール
     */
    public function rules(): array
    {
        return [
            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],
        ];
    }

    /**
     * エラーメッセージ（任意・丁寧）
     */
    public function messages(): array
    {
        return [
            'quantity.required' => '数量を入力してください。',
            'quantity.integer'  => '数量は数字で入力してください。',
            'quantity.min'      => '1以上の数量を指定してください。',
        ];
    }
}
