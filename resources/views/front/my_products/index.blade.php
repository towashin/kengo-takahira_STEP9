@extends('layouts.app')

@section('title', '出品商品一覧')

@section('content')
<h1>出品商品一覧</h1>

<a href="{{ route('my.products.create') }}">＋ 商品を新規登録</a>

@if ($products->isEmpty())
    <p>出品中の商品はありません。</p>
@else
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>商品名</th>
        <th>価格</th>
        <th>操作</th>
    </tr>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ number_format($product->price) }}円</td>
            <td>
                <a href="{{ route('my.products.show', $product) }}">詳細</a>
                |
                <a href="{{ route('my.products.edit', $product) }}">編集</a>
            </td>
        </tr>
    @endforeach
</table>
@endif

@endsection