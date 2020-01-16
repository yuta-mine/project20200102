@extends('layouts.app')
@section('content')

@push('css')
<link href="{{ secure_asset('css/user.css') }}" rel="stylesheet">
<link href="{{ secure_asset('css/profileedit.css') }}" rel="stylesheet">
@endpush

<div class="top-tag panel-body">
    <!-- バリデーションエラーの表⽰に使⽤するエラーファイル-->
    <!-- タスク登録フォーム -->
    <h1>情報の編集</h1>
    <!-- <form method="POST" action="/users/update/{{ $user->id }}" enctype="multipart/form-data" class="formhorizontal"> -->
    <!-- <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" class="formhorizontal"> -->
    <form class="form mt-5" method="POST" action="/users/update/{{ $user->id }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="photo-blocks d-flex justify-content-around">
                <div class="photo-block">

                    <div class="form-group files rounded photo-block-item">
                        <label for="upload1"></label>
                        <input type="file" name="img_name" class="form-control hidden upload-photo" multiple="" id="upload1">
                        @isset($user -> img_name)
                        <img class="user-img" name="img_name" src="/storage/images/{{$user -> img_name}}" alt="">
                        @endisset
                    </div>
                </div>

                <div class="photo-block">

                    <div class="form-group files rounded photo-block-item">
                        <label for="upload2"></label>
                        <input type="file" name="img_name2" class="form-control hidden upload-photo" multiple="" id="upload2">
                        @isset($user->img_name2)
                        <img id="thumbnail2" class="user-img" name="img_name2" src="/storage/images/{{$user -> img_name2}}" alt="">
                        @endisset
                        @empty($user->img_name2)
                        <img id="thumbnail2" class="user-img empty" name="img_name2" src="" alt="">
                        @endempty
                    </div>
                </div>

                <div class="photo-block">
                    <div class="form-group files rounded photo-block-item">
                        <label for="upload3"></label>
                        <input type="file" name="img_name3" class="form-control hidden upload-photo" multiple="" id="upload3">
                        @isset($user->img_name3)
                        <img id="thumbnail3" class="user-img" name="img_name3" src="/storage/images/{{$user -> img_name3}}" alt="">
                        @endisset
                        @empty($user->img_name3)
                        <img id="thumbnail3" class="user-img empty" name="img_name3" src="" alt="">
                        @endempty
                    </div>
                </div>

            </div>


            <div class="infotext">ホールド、ドラッグ、ドロップして写真を並び替えることができます</div>

            <div id="" class="mx-auto">
                <label id="addPhoto" class="button add-media-button tinder-color" for="">
                    メディアを追加する
                </label>
                <!-- <input type="file" name="img_btn" class="form-control hidden" id="uploadBtn"> -->
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
                <label for="job" class="col-sm-3 control-label">会社について</label>
                <input type="text" name="job" id="job" class="form-control" value="{{ $user->job }}">

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
        // ロードが終わったら写真登録エリアにchangeイベントをつくる
        window.onload = function() {
            document.querySelectorAll('.upload-photo').forEach(function(elm) {
                elm.addEventListener('change', function(e) {
                    let currentNode = elm; // inputタグのdom
                    //console.log(e); // input fileの情報
                    if (e.target.files.length) {
                        let reader = new FileReader;
                        reader.onload = function(e) {
                            currentNode.nextElementSibling.setAttribute('src', e.target.result);
                            currentNode.nextElementSibling.classList.remove('empty');
                            labelSet(); //メディアボタンのラベルを更新
                        };
                        return reader.readAsDataURL(e.target.files[0]);
                    }
                });
            });
            labelSet();
        }

        // メディアボタンのラベル更新
        function labelSet() {
            let loopSwt = true;
            document.querySelectorAll('.photo-block-item').forEach(function(elm) {
                //console.log(elm.children[2]);  // 子要素が複数ある場合の指定の方法？
                if (loopSwt) {
                    labelElm = elm.children[0]; //.photo-block-item の label要素
                    imageElm = elm.children[2]; //.photo-block-item の img要素
                    emptyImageElm = imageElm.classList.contains('empty'); // true/false
                    if (emptyImageElm === true) {
                        // 画像が空の要素があれば以下の処理
                        console.log(labelElm.getAttribute('for'));
                        //空のところのラベルforの値を取得
                        let mediaBtnLabel = labelElm.getAttribute('for');
                        // 取得したforをメディアボタンのラベルに入れる
                        document.getElementById('addPhoto').setAttribute('for', mediaBtnLabel);
                        loopSwt = false;
                    }
                }
            });
        }
        
    </script>

</div>
@endsection