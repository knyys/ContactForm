<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__logo">
                FashionablyLate
            </div>
            <div class="header-nav">
            @if(request()->is('register'))
                <a class="header-nav__button" href="/login">login</a>
            @elseif(request()->is('login'))
                <a class="header-nav__button" href="/register">register</a>
            @elseif(Auth::check())
                <form class="header-nav__button--logout" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">logout</button>
                </form>
            @endif
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>