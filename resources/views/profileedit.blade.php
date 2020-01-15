@extends('layouts.app')
@section('content')

@push('css')
<link href="{{ secure_asset('css/user.css') }}" rel="stylesheet">
<link href="{{ secure_asset('css/profileedit.css') }}" rel="stylesheet">
@endpush

<div class="panel-body">
    <!-- バリデーションエラーの表⽰に使⽤するエラーファイル-->
    <!-- タスク登録フォーム -->
    <h1>PROFILE EDIT</h1>
    <!-- <form method="POST" action="/users/update/{{ $user->id }}" enctype="multipart/form-data" class="formhorizontal"> -->
    <!-- <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" class="formhorizontal"> -->
    <form class="form mt-5" method="POST" action="/users/update/{{ $user->id }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="photo-blocks d-flex justify-content-around">
                <div class="photo-block">
                    <div class="form-group files rounded">
                        <label for="upload1"></label>
                        <input type="file" name="img_name" class="form-control hidden upload-photo" multiple="" id="upload1">
                        <img class="user-img" src="/storage/images/{{$user -> img_name}}" alt="">
                    </div>
                </div>

                <div class="photo-block">
                    <div class="form-group files rounded">
                        <label for="upload2"></label>
                        <input type="file" name="img_name2" class="form-control hidden upload-photo" multiple="" id="upload2">
                        <img id="thumbnail" class="user-img" src="/storage/images/{{$user -> img_name2}}" alt="">
                    </div>
                </div>

                <div class="photo-block">
                    <div class="form-group files rounded">
                        <label for="upload3"></label>
                        <input type="file" class="form-control hidden upload-photo" multiple="" id="upload3">
                        <img id="" class="user-img" src="" alt="">
                    </div>
                </div>


            </div>

            <div class="infotext">ホールド、ドラッグ、ドロップして写真を並び替えることができます</div>

            <div id="" class="mx-auto">
                <a class="button add-media-button tinder-color" href="#">メディアを追加する</a>
            </div>


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
                <textarea type="text" name="self_introduction" id="self_introduction" class="form-control" value="">{{$user->self_introduction}}</textarea>
            </div>
            <div class="col-sm-6 form-primary">
                <label for="user_interests" class="col-sm-3 control-label">
                    興味
                </label>
                <div class="form-control d-flex justify-content-between align-items-center">
                    <div>{{ $user->hobby1 }}</div>
                    <div>{{ $user->hobby2 }}</div>
                    <div>{{ $user->hobby3 }}</div>
                    <div>{{ $user->hobby4 }}</div>
                    <div>{{ $user->hobby5 }}</div>
                    <!-- <input type="text" name="user_interests" id="user_interests" class="" value=""> -->
                    <a class="next-icon" href="" role="button" data-slide="next" onclick="
                            preventDefault();
                            document.getElementById('interest_form').submit();
                        ">
                        <i class="fas fa-angle-right"></i>
                    </a>
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
                <label for="user_favorite" class="col-sm-3 control-label">学校: {{ $user->school }}</label>
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
                <label for="name"" class=" col-sm-3 control-label">名前</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="col-sm-6 form-primary">
                <label for="sex" class="col-sm-3 control-label">性別</label>
                <input type="text" name="sex" id="sex" class="form-control" value="{{ $user->sex }}">
            </div>
            <div class="col-sm-6 form-primary">
                <label for="email" class="col-sm-3 control-label">email</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">完了</button>
            </div>
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).on("change", ".upload-photo", function(e) {
            let currentNode = $(this)[0];
            var reader;
            if (e.target.files.length) {
                reader = new FileReader;
                reader.onload = function(e) {
                    currentNode.nextElementSibling.setAttribute('src', e.target.result);
                };
                return reader.readAsDataURL(e.target.files[0]);
            }
        });

    </script>
</div>
@endsection