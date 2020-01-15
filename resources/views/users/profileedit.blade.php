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
                    <div class="form-group files rounded photo-block-item">
                        <label for="upload1"></label>
                        <input type="file" name="img_name" class="form-control hidden upload-photo" multiple="" id="upload1">
                        @isset($user -> img_name)
                        <img class="user-img" src="/storage/images/{{$user -> img_name}}" alt="">
                        @endisset
                    </div>
                </div>

                <div class="photo-block">
                    <div class="form-group files rounded photo-block-item">
                        <label for="upload2"></label>
                        <input type="file" name="img_name2" class="form-control hidden upload-photo" multiple="" id="upload2">
                        @isset($user->img_name2)
                        <img id="thumbnail2" class="user-img" src="/storage/images/{{$user -> img_name2}}" alt="">
                        @endisset
                        @empty($user->img_name2)
                        <img id="thumbnail2" class="user-img empty" src="" alt="">
                        @endempty
                    </div>
                </div>

                <div class="photo-block">
                    <div class="form-group files rounded photo-block-item">
                        <label for="upload3"></label>
                        <input type="file" name="img_name3" class="form-control hidden upload-photo" multiple="" id="upload3">
                        @isset($user->img_name3)
                        <img id="thumbnail3" class="user-img" src="/storage/images/{{$user -> img_name3}}" alt="">
                        @endisset
                        @empty($user->img_name3)
                        <img id="thumbnail3" class="user-img empty" src="" alt="">
                        @endempty
                    </div>
                </div>
            </div>

            <div class="infotext">ホールド、ドラッグ、ドロップして写真を並び替えることができます</div>

            <div id="" class="mx-auto">
                <label class="button add-media-button tinder-color" for="upload4">
                    メディアを追加する
                </label>
                <input type="file" name="img_name" class="form-control hidden" id="upload4">
            </div>


            <div class="col-sm-6 form-primary">
                <div id="smartPhoto" class="form-control d-flex justify-content-between align-items-center">
                    <div>スマートフォト</div>
                    <div class="toggleSwt d-flex align-items-center">
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
                    <div>fav, fav2, fav3</div>
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
                <label for="name"" class=" col-sm-3 control-label">名前</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="col-sm-6 form-primary">
                <label for="sex" class="col-sm-3 control-label">性別</label>
                <div class="form-control d-flex justify-content-between align-items-center">
                    <div>{{ $user->sex }}</div>
                    <input type="text" name="sex" id="sex" class="form-control" value="{{ $user->sex }}">
                    <a class="next-icon" href="/users/gender/{{Auth::id()}}" role="button" data-slide="next" onclick="">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </div>
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

    <script>
        // profileedit 

        window.onload = function() {
            document.querySelectorAll('.upload-photo').forEach(function(elm) {
                elm.addEventListener('change', function(e) {
                    let currentNode = elm; // inputタグのdom
                    console.log(e); // input fileの情報
                    if (e.target.files.length) {
                        let reader = new FileReader;
                        reader.onload = function(e) {
                            currentNode.nextElementSibling.setAttribute('src', e.target.result);
                            currentNode.nextElementSibling.classList.remove('empty');
                        };
                        return reader.readAsDataURL(e.target.files[0]);
                    }
                })
            });
        }

        //プロフィール画像を登録する
        // $(document).on("change", ".upload-photo", function(e) {
        //     console.log(e);               // eはinputのファイル情報？が入る
        //     let currentNode = $(this)[0]; // inputのDOMの情報がはいる
        //     if (e.target.files.length) {
        //         let reader = new FileReader;
        //         reader.onload = function(e) {
        //             currentNode.nextElementSibling.setAttribute('src', e.target.result);
        //             currentNode.nextElementSibling.classList.remove('empty');
        //         };
        //         return reader.readAsDataURL(e.target.files[0]);
        //     }
        // });

        // メディアを追加するボタン
        document.getElementById('upload4').addEventListener('change', function(e) {
            let targetElm = document.querySelector('.empty');
            if (e.target.files.length) {
                let reader = new FileReader;
                reader.onload = function(e) {
                    targetElm.setAttribute('src', e.target.result);
                    targetElm.classList.remove('empty');
                };
                return reader.readAsDataURL(e.target.files[0]);
            }
        })
    </script>
</div>
@endsection