<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'ECサイト')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

@include('components.header')

<main>
    @yield('content')
</main>

@include('components.footer')

</body>
</html>
