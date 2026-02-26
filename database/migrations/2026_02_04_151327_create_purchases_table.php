<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            // 購入者
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // 購入された商品
            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            // 購入時価格（価格変動対策）
            $table->integer('price');

            // 購入数
            $table->integer('quantity');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};