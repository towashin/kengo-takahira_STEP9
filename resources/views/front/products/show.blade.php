@extends('layouts.app')

@section('title', '商品詳細')

@section('content')
<div class="product-detail">
    <h1 class="product-detail__title">{{ $product->name }}</h1>

    <p class="product-detail__price">
        価格：{{ number_format($product->price) }}円
    </p>

    {{-- お気に入りボタン --}}
    @auth
    <button 
        id="favorite-button"
        class="favorite {{ $isFavorited ? 'favorite--active' : '' }}"
        data-product-id="{{ $product->id }}"
    >
        ♥
    </button>
    @endauth

    <div class="product-detail__actions">
        {{-- カートに追加 --}}
        <form method="POST" action="{{ route('cart.add', $product->id) }}">
            @csrf
            <button type="submit" class="product-detail__button">
                カートに追加
            </button>
        </form>

        {{-- 戻る --}}
        <a href="{{ route('products.index') }}" class="product-detail__back">
            戻る
        </a>
    </div>
</div>

{{-- お気に入り切替JS --}}
<script>
document.getElementById('favorite-button')?.addEventListener('click', function () {
    const button = this;
    const productId = button.dataset.productId;

    fetch("{{ route('favorites.toggle') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ product_id: productId }),
    })
    .then(res => res.json())
    .then(data => {
        if (data.favorited) {
            button.classList.add('favorite--active');
        } else {
            button.classList.remove('favorite--active');
        }
    });
});
</script>

@if ($product->stock > 0)
    <a href="{{ route('products.purchase.form', $product->id) }}">
        購入する
    </a>
@else
    <p>売り切れ</p>
@endif
@endsection

@extends('layouts.app')

@section('title', '出品商品詳細')

@section('content')
<h1>出品商品詳細</h1>

<p>商品名：{{ $product->name }}</p>
<p>価格：{{ number_format($product->price) }} 円</p>
<p>在庫：{{ $product->stock }}</p>
<p>登録日：{{ $product->created_at->format('Y-m-d') }}</p>

<hr>

<a href="{{ route('my.products.edit', $product) }}">
    編集する
</a>

<form method="POST"
      action="{{ route('my.products.destroy', $product) }}"
      onsubmit="return confirm('本当に削除しますか？');"
      style="margin-top:10px;">
    @csrf
    @method('DELETE')

    <button type="submit" style="color:red;">
        削除する
    </button>
</form>

<a href="{{ route('my.products.index') }}">戻る</a>
@endsection