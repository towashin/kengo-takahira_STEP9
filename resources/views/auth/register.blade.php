@extends('layouts.app')

@section('title', '新規ユーザー登録')

@section('content')
<div class="auth">
    <h1 class="auth__title">新規ユーザー登録</h1>

    @if ($errors->any())
        <div class="auth__error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="auth__form">
        @csrf

        <div class="auth__group">
            <label class="auth__label">ユーザー名</label>
            <input type="text" name="username" value="{{ old('username') }}" required class="auth__input">
        </div>

        <div class="auth__group">
            <label class="auth__label">名前（漢字）</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="auth__input">
        </div>

        <div class="auth__group">
            <label class="auth__label">名前（カナ）</label>
            <input type="text" name="name_kana" value="{{ old('name_kana') }}" required class="auth__input">
        </div>

        <div class="auth__group">
            <label class="auth__label">メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="auth__input">
        </div>

        <div class="auth__group">
            <label class="auth__label">パスワード</label>
            <input type="password" name="password" required class="auth__input">
        </div>

        <div class="auth__group">
            <label class="auth__label">パスワード（確認）</label>
            <input type="password" name="password_confirmation" required class="auth__input">
        </div>

        <div class="auth__actions">
            <button type="submit" class="auth__button">
                登録する
            </button>
        </div>
    </form>
</div>
@endsection
