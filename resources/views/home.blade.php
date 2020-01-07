<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('scss/jTinder.scss') }}" rel="stylesheet"> -->
</head>

<body>

    <!-- @section('content') -->

    <div class="topPage">
        <nav class="nav">
            <ul>
                <li class="personIcon">
                    <a href="/users/show/{{Auth::id()}}"><i class="fas fa-user fa-2x">aa</i></a></li>
                <li class="appIcon"><a href="{{route('home')}}"><img src="/storage/images/techpit-match-icon.png"></a></li>
            </ul>
        </nav>
        <div id="tinderslide">
            <ul>
                @foreach($users as $user)
                <!-- 変数名->テーブルの要素 という書き方で、データベーステーブル内の情報を表示 -->
                <li data-user_id="{{ $user->id }}">
                    <!-- 名前 -->
                    <div class="userName">{{ $user->name }}</div>
                    <!-- 年齢 -->
                    <!-- <div class="userName">{{ $user->age }}</div> -->
                    <!-- 写真 -->
                    <img src="/storage/images/{{ $user->img_name}}">
                    <!-- 自己紹介 -->
                    <div class="selfintro">{{ $user->self_introduction }}</div>
                    <!-- 距離 -->
                    <!-- <div class="userName">{{ $user->distance }}</div> -->
                    <div class="like">
                    </div>
                    <div class="dislike">
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="noUser">近くにお相手がいません。</div>
        </div>
        <div class="actions" id="actionBtnArea">
            <a href="#" class="dislike"><i class="fas fa-times fa-2x"></i></a>
            <a href="#" class="like"><i class="fas fa-heart fa-2x"></i></a>
        </div>
    </div>

    <!-- @endsection -->
    <!-- @yield('content') -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>