<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rese</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  @yield('css')
</head>

<body>
    <div class="grid__container">
        <header class="header">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="header__nav">
                <ul class="nav__list">
                    <li><a href="/" class="nav__item">Home</a></li>
                    @if (Auth::check())
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="nav__item" type="submit">Logout</button>
                        </form>
                    </li>
                    <li><a href="" class="nav__item">Mypage</a></li>
                    @else
                    <li><a href="/register" class="nav__item">Registration</a></li>
                    <li><a href="/login" class="nav__item">Login</a></li>
                    @endif
                </ul>
            </nav>
            <div class="header__title">
                <h1><a class="header__title--text" href="/">Rese</a></h1>
            </div>
        </header>
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/nav.js') }}"></script>

</body>

</html>