@extends('layouts.app')

@section('title', 'マイページ')

@section('content')
<h1>マイページ</h1>

{{-- アカウント編集 --}}
<a href="{{ route('profile.edit') }}">アカウント編集</a>

<hr>

{{-- ユーザー情報 --}}
<h2>ユーザー情報</h2>
<p>ユーザー名：{{ $user->username }}</p>
<p>メールアドレス：{{ $user->email }}</p>
<p>名前：{{ $user->name }}</p>
<p>カナ：{{ $user->kana }}</p>

<hr>

{{-- 出品商品 --}}
<h2>出品商品一覧</h2>

<a href="{{ route('products.create') }}">商品新規登録</a>

@if ($products->isEmpty())
    <p>出品中の商品はありません。</p>
@else
<table border="1" cellpadding="5">
    <tr>
        <th>商品番号</th>
        <th>商品名</th>
        <th>操作</th>
    </tr>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>
                <a href="{{ route('my.products.show', $product) }}">
                    詳細
                </a>
            </td>
        </tr>
    @endforeach
</table>
@endif

<hr>

{{-- 購入商品 --}}
<h2>購入商品一覧</h2>

@if ($purchases->isEmpty())
    <p>購入履歴はありません。</p>
@else
<table border="1" cellpadding="5">
    <tr>
        <th>購入日</th>
        <th>商品名</th>
    </tr>
    @foreach ($purchases as $purchase)
        <tr>
            <td>{{ $purchase->created_at->format('Y-m-d') }}</td>
            <td>{{ $purchase->product->name }}</td>
        </tr>
    @endforeach
</table>
@endif
@endsection