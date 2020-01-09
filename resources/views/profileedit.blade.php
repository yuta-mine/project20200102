@extends('layouts.app')
@section('content')

@push('css')
    <link href="{{ secure_asset('css/user.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/profileedit.css') }}" rel="stylesheet">
@endpush

<div class="panel-body">
    <!-- バリデーションエラーの表⽰に使⽤するエラーファイル-->
    <!-- タスク登録フォーム -->
    <form action="{{ route('users.update', $user->id)}}" method="POST" class="formhorizontal">
        @method('PUT')
        @csrf
        <h1>PROFILE EDIT</h1>

        <div class="form-group">
            <!--  -->
            <div class="photo-blocks d-flex justify-content-around">
                <div class="photo-block">
                    <form method="post" action="#" id="#">
                        <div class="form-group files rounded">
                            <label for="upload1"></label>
                            <input type="file" class="form-control hidden" multiple="" id="upload1">
                        </div>
                    </form>
                </div>
                <div class="photo-block">
                    <form method="post" action="#" id="#">
                        <div class="form-group files color">
                            <label for="upload2"></label>
                            <input type="file" class="form-control hidden" multiple="" id="upload2">
                        </div>
                    </form>
                </div>
                <div class="photo-block">
                    <form method="post" action="#" id="#">
                        <div class="form-group files color">
                            <label for="upload3"></label>
                            <input type="file" class="form-control hidden" multiple="" id="upload3">
                        </div>
                    </form>
                </div>
            </div>

            <div class="infotext">ホールド、ドラッグ、ドロップして写真を並び替えることができます</div>

            <div id="" class="mx-auto">
                <a class="button add-media-button tinder-color" href="#">メディアを追加する</a>
            </div>

            <!--  -->
            <div class="col-sm-6 form-primary">
                <div id="smartPhoto" class="form-control d-flex justify-content-between align-items-center">
                    <div>スマートフォト</div>
                    <div class="d-flex align-items-center">
                        <input type="checkbox" id="demo01" checked />
                        <label for="demo01" data-on-label="" data-off-label=""></label>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 form-primary">
                <label for="comment" class="col-sm-3 control-label">{{$user->name}}について紹介</label>
                <textarea type="text" name="bio" id="bio" class="form-control" value="">yrsrt</textarea>
            </div>
            <div class="col-sm-6 form-primary">
                <label for="user_interests" class="col-sm-3 control-label">
                    興味
                </label>
                <div class="form-control d-flex justify-content-between align-items-center">
                    <div>fav, fav2, fav3</div>
                    <!-- <input type="text" name="user_interests" id="user_interests" class="" value=""> -->
                    <a class="next-icon" href="" role="button" data-slide="next" onclick="
                            preventDefault();
                            document.getElementById('interest_form').submit();
                        ">
                        <i class="fas fa-angle-right"></i>
                    </a>
                    <form id="interest_form" action="" method="GET" style="display: none">
                </div>
            </div>
            <div class="col-sm-6 form-primary">
                <label for="user_favorite" class="col-sm-3 control-label">肩書き</label>
                <input type="text" name="user_favorite" id="user_favorite" class="form-control" value="">
            </div>
            <div class="col-sm-6 form-primary">
                <label for="user_favorite" class="col-sm-3 control-label">会社について</label>
                <input type="text" name="user_favorite" id="user_favorite" class="form-control" value="">
            </div>
            <div class="col-sm-6 form-primary">
                <label for="user_favorite" class="col-sm-3 control-label">学校: API?</label>
                <input type="text" name="user_favorite" id="user_favorite" class="form-control" value="">
            </div>
            <div class="col-sm-6 form-primary">
                <label for="user_favorite" class="col-sm-3 control-label">在住地: GglMap API?</label>
                <input type="text" name="user_favorite" id="user_favorite" class="form-control" value="">
            </div>
            <div class="col-sm-6 form-primary">
                <label for="user_favorite" class="col-sm-3 control-label">Instagramの写真を表示</label>
                <input type="text" name="user_favorite" id="user_favorite" class="form-control" value="">
            </div>
            <div class="col-sm-6 form-primary">
                <label for="user_favorite" class="col-sm-3 control-label">Spotifyアンセム</label>
                <input type="text" name="user_favorite" id="user_favorite" class="form-control" value="">
            </div>
            <div class="col-sm-6 form-primary">
                <label for="user_favorite" class="col-sm-3 control-label">性別</label>
                <input type="text" name="user_favorite" id="user_favorite" class="form-control" value="">
            </div>
        </div>
        <!-- タスク登録ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection