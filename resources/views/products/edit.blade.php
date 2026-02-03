@extends('layouts.app')

@section('title', '出品商品編集')

@section('content')
<h1>出品商品編集</h1>

<form method="POST"
      action="{{ route('my.products.update', $product) }}"
      enctype="multipart/form-data">
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
        <label>商品説明</label><br>
        <textarea name="description">{{ old('description', $product->description) }}</textarea>
    </div>

    <div>
        <label>在庫数</label><br>
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
    </div>

    <div>
        <label>商品画像</label><br>
        <input type="file" name="image">
        @if ($product->image_path)
            <p>
                <img src="{{ asset('storage/' . $product->image_path) }}"
                     width="150">
            </p>
        @endif
    </div>

    <button type="submit">更新</button>
    <a href="{{ route('my.products.show', $product) }}">戻る</a>
</form>
@endsection