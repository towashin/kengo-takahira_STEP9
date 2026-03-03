@extends('layouts.app')

@section('title', '出品商品詳細')

@section('content')
<h1>出品商品詳細</h1>

<p><strong>商品名：</strong>{{ $product->name }}</p>
<p><strong>価格：</strong>{{ number_format($product->price) }}円</p>
<p><strong>在庫：</strong>{{ $product->stock }}</p>
<p><strong>説明：</strong>{{ $product->description }}</p>

<hr>

<a href="{{ route('my.products.edit', $product) }}">編集する</a>

<form action="{{ route('my.products.destroy', $product) }}" method="POST" style="margin-top:10px;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('削除しますか？')">
        削除
    </button>
</form>

<br>
<a href="{{ route('my.products.index') }}">← 一覧に戻る</a>

@endsection