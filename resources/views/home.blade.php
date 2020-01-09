@extends('layouts.layout')

@section('content')

<div class="topPage">
    <nav class="nav">
        <ul>
            <li class="personIcon">
                <a href="/users/show/{{Auth::id()}}"><i class="fas fa-user fa-2x">profile</i></a></li>
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

                <!-- <img src="/storage/images/{{ $user->img_name2}}"> -->
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

@endsection