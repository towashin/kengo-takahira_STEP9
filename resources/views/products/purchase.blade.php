@extends('layouts.app')

@section('title', '商品購入')

@section('content')
<div class="purchase">
    <h1>{{ $product->name }}</h1>

    <p>価格：{{ number_format($product->price) }}円</p>
    <p>残り：{{ $product->stock }}</p>

    {{-- 在庫がある場合のみ購入可能 --}}
    @if ($product->stock > 0)
        <form method="POST" action="{{ route('products.purchase', $product->id) }}">
            @csrf

            <div class="purchase__group">
                <label for="quantity">購入個数</label>
                <input
                    type="number"
                    name="quantity"
                    id="quantity"
                    min="1"
                    max="{{ $product->stock }}"
                    value="1"
                    required
                >
            </div>

            @error('quantity')
                <p class="error">{{ $message }}</p>
            @enderror

            <button type="submit" class="purchase__button">
                購入する
            </button>
        </form>
    @else
        <p class="purchase__soldout">売り切れです</p>
    @endif

    <a href="{{ route('products.show', $product->id) }}">戻る</a>
</div>
@endsection