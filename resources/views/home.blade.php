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
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('scss/jTinder.scss') }}" rel="stylesheet"> -->
</head>

<body>
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
                    <!-- 写真 -->
                    <img src="/storage/images/{{ $user->img_name}}">
                    <!-- 名前 -->
                    <div class="userName">{{ $user->name }}</div>
                    <!-- 年齢 -->
                    <!-- <div class="userage">{{ $user->age }}</div> -->
                    <!-- 距離 -->
                    <!-- <div class="userdistance">{{ $user->distance }}</div> -->
                    <!-- 自己紹介 -->
                    <div class="selfintro">{{ $user->self_introduction }}</div>

                    <div class="like"></div>
                    <div class="dislike"></div>
                </li>
                @endforeach
            </ul>
            <div class="noUser">近くにお相手がいません。</div>
        </div>
        <div class="actions" id="actionBtnArea">
            <a href="#" class="back"><i class="fas fa-times fa-2x"></i>戻る</a>
            <a href="#" class="dislike"><i class="fas fa-times fa-2x"></i>NOPE</a>
            <!-- <a href="#" class="superlike"><i class="fas fa-times fa-2x"></i></a> -->
            <a href="#" class="like"><i class="fas fa-heart fa-2x"></i>LIKE</a>
            <!-- 詳細確認ボタン -->
            <a href="home_detail.blade" class="detail"><i class="fas fa-times fa-2x"></i>詳細</a>
        </div>
    </div>
    <!-- @section('content') -->
    <!-- @yield('content') --> -->
    <!-- @endsection -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>