@extends('layouts.app')

@section('title', '商品新規登録')

@section('content')
<div class="container">
    <h1>商品新規登録</h1>

    {{-- フラッシュメッセージ --}}
    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- バリデーションエラー --}}
    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('my.products.store') }}" method="POST" class="form-card">
        @csrf

        <div class="form-group">
            <label for="name">商品名</label>
            <input type="text" name="name" id="name"
                   value="{{ old('name') }}"
                   required>
        </div>

        <div class="form-group">
            <label for="price">価格</label>
            <input type="number" name="price" id="price"
                   value="{{ old('price') }}"
                   min="0"
                   required>
        </div>

        <div class="form-group">
            <label for="stock">在庫数</label>
            <input type="number" name="stock" id="stock"
                   value="{{ old('stock') }}"
                   min="0"
                   required>
        </div>

        <div class="form-group">
            <label for="description">商品説明</label>
            <textarea name="description" id="description" rows="5">{{ old('description') }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">
                登録する
            </button>

            <a href="{{ route('my.products.index') }}" class="btn-secondary">
                戻る
            </a>
        </div>
    </form>
</div>
@endsection