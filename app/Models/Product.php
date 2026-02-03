<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // プロパティは1回だけ定義
    protected $fillable = [
        'user_id',
        'name',
        'price',
        'description',
        'stock',
        'image_path',
    ];

    // リレーション：User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // リレーション：Favorite
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // 特定のユーザーがお気に入りしているか判定
    public function isFavoritedBy($user)
    {
        if (!$user) {
            return false;
        }

        return $this->favorites()->where('user_id', $user->id)->exists();
    }
}