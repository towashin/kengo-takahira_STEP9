@extends('layouts.app')

@section('title', '商品新規登録')

@section('content')
<div class="product-create">
    <h1>商品新規登録</h1>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <div>
            <label>商品名</label><br>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>価格</label><br>
            <input type="number" name="price" value="{{ old('price') }}">
            @error('price')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>在庫数</label><br>
            <input type="number" name="stock" value="{{ old('stock') }}">
            @error('stock')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">登録する</button>
    </form>

    <a href="{{ route('products.index') }}">戻る</a>
</div>
@endsection