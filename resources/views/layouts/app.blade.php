<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tinder Laravel</title>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    <script src="{{ secure_asset('js/user.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <style>
        a>i {
            font-size: 24px;
            margin: 0 20px;
        }

        nav {
            background-color: #fff;
            border-bottom: 1px solid #DFE0E3;
            width: 100%;
            height: 42px;
            position: fixed;
            z-index: 9;
        }

        .user-link {
            position: fixed;
            top: 22px;
            left: 50%;
            transform: translate(-50%, -50%);
        }

    </style>
    @stack('css')

<body>
    <div id="app">
        <nav class="d-flex justify-content-between align-items-center">
            <div></div>
            <a class="user-link" href="/users/show/{{Auth::id()}}">
                <i class="far fa-user"></i>
            </a>
            <a href="/home">
                <i class="fas fa-fire"></i>
            </a>

        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>