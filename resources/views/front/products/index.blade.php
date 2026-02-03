@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
<div class="product-list">
    <h1 class="product-list__title">商品一覧</h1>

    @if($products->isEmpty())
        <p class="product-list__empty">表示する商品がありません。</p>
    @else
        <table class="product-list__table">
            <thead>
                <tr>
                    <th>商品番号</th>
                    <th>商品名</th>
                    <th>価格</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td>{{ number_format($product->price) }}円</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
