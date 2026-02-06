<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Purchase;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * 一括代入可能な属性
     */
    protected $fillable = [
        'username',
        'name',
        'kana',
        'email',
        'password',
    ];

    /**
     * JSON化・配列化時に隠す属性
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * キャスト定義
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 購入履歴
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}