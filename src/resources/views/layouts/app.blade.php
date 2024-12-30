<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'NewOJT')</title>
    @vite('resources/css/sass/app.scss')
</head>
<body>

{{--header--}}
<header class="l-header">
    <nav class="">
        <a href="{{ route('product.index') }}" class="">商品一覧</a>
        @auth
            <a href="{{ route('my_page') }}" class="">マイページ</a>
            <a href="{{ route('product.create') }}" class="">商品登録</a>
            <a href="{{ route('logout') }}" class="">ログアウト</a>
        @else
            <a href="{{ route('login') }}" class="">ログイン</a>
            <a href="{{ route('register') }}" class="">新規登録</a>
        @endauth
    </nav>
</header>

{{--main--}}
<main class="l-main">
    <div class="p-title">
        <h2 class="p-title__content c-title">
            @yield('contentTitle', 'NewOJT')
        </h2>
    </div>

    @yield('content')
</main>

{{--footer--}}
<footer class="l-footer">
    <p class="">footer</p>
</footer>
</body>
</html>
