@extends('layouts.app')
@section('content')
@push('css')
<link href="{{ secure_asset('css/user.css') }}" rel="stylesheet">
@endpush

<div class="panel-body">
    <!-- バリデーションエラーの表⽰に使⽤するエラーファイル-->

    <!-- タスク登録フォーム -->
    <div class="form-group">

        <!-- <div>NOT Vue.js</div> -->
        <div class="user-info arc top-tag">
            <div class="top-img-area mx-auto">
                <!-- <img src="{{$user->profile_img_url}}" alt=""> -->
                <img class="top-img img-thumbnail rounded-circle img-responsive full-width" src="/storage/images/{{$user -> img_name}}" alt="">
            </div>
            <div id="bio" class="bio">
                <span class="name">{{ $user->name }}</span>
                <span class="age">{{ $user->age }}</span>
                <span class="age">{{ $user->id }}</span>
            </div>

            <div class="user-menu">
                <div class="d-flex justify-content-between">
                    <!-- <div id="setting" class="icon-block">
                        <a href="#"><i class="icon fas fa-cog"></i></a>
                        <p>設定</p>
                    </div> -->

                    <div id="setting" class="icon-block">
                        <a href="" onclick="event.preventDefault(); 
                        console.log(document.getElementById('setting_form'));
                        document.getElementById('setting_form').submit();">
                            <i class="icon fas fa-cog"></i>
                        </a>
                        <p>設定</p>
                    </div>
                    <form id="setting_form" action="{{ route('users.setting', $user->id) }}" method="GET" style="display: none">
                    </form>

                    <div id="edit_profile" class="icon-block">
                        <a href="{{ route('users.edit', $user->id) }}" onclick="event.preventDefault(); 
                        document.getElementById('profileedit').submit();">
                            <i class="icon fas fa-pencil-alt"></i>
                        </a>
                        <p>情報の編集</p>
                    </div>
                    <form id="profileedit" action="{{ route('users.edit', $user->id) }}" method="GET" style="display: none">
                        <!-- <button type="submit">test</button> -->
                    </form>

                </div>
                <div id="add_media" class="icon-block">
                    <a href="#">
                        <i class="icon fas fa-camera"></i>
                    </a>
                    <p>メディアを追加する</p>
                    <i class="fas fa-plus-circle"></i>
                </div>
            </div>
        </div>

        <!-- slide show -->

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div id="target" class="carousel-inner">
                <div class="carousel-item active">
                    <h3>マイ TINDER PLUS</h3>
                    <div class="d-block w-100">test1test1test1test1test1</div>
                </div>
                <div class="carousel-item">
                    <h3>マイ TINDER PLUS 2</h3>
                    <div class="d-block w-100">test2test2test2test2test2</div>
                </div>
                <div class="carousel-item">
                    <h3>マイ TINDER PLUS 3</h3>
                    <div class="d-block w-100">test3test3test3test3test3</div>
                </div>

            </div>
            <div>
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
            </div>
        </div>
        <!--  -->
        <div id="tinder_button mx-auto" class="tinder-button-area">
            <a class="button tinder-button-text" href="#">マイ TINDER PLUS</a>
        </div>



    </div>
    <!-- タスク登録ボタン -->
    <!-- <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div> -->


</div>
@endsection