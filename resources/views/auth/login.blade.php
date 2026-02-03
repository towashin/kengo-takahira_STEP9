@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
<div class="auth">
    <h1 class="auth__title">ログイン</h1>

    @if ($errors->any())
        <div class="auth__error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="auth__form">
        @csrf

        <div class="auth__group">
            <label for="email" class="auth__label">メールアドレス</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                class="auth__input"
            >
        </div>

        <div class="auth__group">
            <label for="password" class="auth__label">パスワード</label>
            <input
                id="password"
                type="password"
                name="password"
                required
                class="auth__input"
            >
        </div>

        <div class="auth__group auth__group--checkbox">
            <label>
                <input type="checkbox" name="remember">
                ログイン状態を保持する
            </label>
        </div>

        <div class="auth__actions">
            <button type="submit" class="auth__button">
                ログイン
            </button>
        </div>
    </form>
</div>
@endsection
