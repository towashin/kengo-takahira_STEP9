@extends('layouts.app')

@section('title', '商品編集')

@section('content')
<h1>商品編集</h1>

<form action="{{ route('my.products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>商品名</label><br>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
    </div>

    <div>
        <label>価格</label><br>
        <input type="number" name="price" value="{{ old('price', $product->price) }}">
    </div>

    <div>
        <label>在庫</label><br>
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
    </div>

    <div>
        <label>説明</label><br>
        <textarea name="description">{{ old('description', $product->description) }}</textarea>
    </div>

    <br>
    <button type="submit">更新する</button>
</form>

<br>
<a href="{{ route('my.products.show', $product) }}">← 詳細へ戻る</a>

@endsection