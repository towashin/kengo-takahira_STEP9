@extends('layouts.app')

@section('title', 'お問い合わせ')

@section('content')
<h1>お問い合わせ</h1>

@if (session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('contact.store') }}">
    @csrf

    <div>
        <label>名前</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>メールアドレス</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>お問い合わせ内容</label><br>
        <textarea name="message">{{ old('message') }}</textarea>
        @error('message')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">送信</button>
    <a href="{{ url()->previous() }}">戻る</a>
</form>
@endsection