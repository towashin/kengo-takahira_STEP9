@extends('layouts.app')

@section('title', 'アカウント編集')

@section('content')
<h1>アカウント編集</h1>

<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    <div>
        <label>ユーザー名</label><br>
        <input type="text" name="username"
               value="{{ old('username', $user->username) }}">
        @error('username')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>メールアドレス</label><br>
        <input type="email" name="email"
               value="{{ old('email', $user->email) }}">
        @error('email')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>名前</label><br>
        <input type="text" name="name"
               value="{{ old('name', $user->name) }}">
        @error('name')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>カナ</label><br>
        <input type="text" name="kana"
               value="{{ old('kana', $user->kana) }}">
        @error('kana')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">更新</button>
    <a href="{{ route('mypage.index') }}">戻る</a>
</form>
@endsection