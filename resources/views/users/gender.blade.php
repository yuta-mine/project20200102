@extends('layouts.app')
@section('content')

@push('css')
<link href="{{ secure_asset('css/user.css') }}" rel="stylesheet">
<link href="{{ secure_asset('css/profileedit.css') }}" rel="stylesheet">
@endpush

<div class="panel-body">
    <!-- バリデーションエラーの表⽰に使⽤するエラーファイル-->
    <!-- タスク登録フォーム -->
    <h1>性別</h1>
    <div>{{ Auth::user()->sex }}</div>
    <form class="form mt-5" method="POST" action="/users/genderEdit/{{ Auth::user()->id }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="col-sm-6 form-primary">
                <div id="smartPhoto" class="form-control d-flex justify-content-between align-items-center">
                    <div>プロフィールに性別を表示する</div>
                    <div class="toggleSwt d-flex align-items-center">
                        <input type="checkbox" id="demo01" checked />
                        <label for="demo01" data-on-label="" data-off-label=""></label>
                    </div>
                </div>
            </div>

            <div class="genderOption col-sm-6 form-control d-flex justify-content-between align-items-center">
                <label for="male" class="col-sm-3 control-label">男</label>
                @if( Auth::user()->sex === 0)
                <input type="checkbox" name="male" id="male" class="checkbox" value="" checked>
                @else
                <input type="checkbox" name="male" id="male" class="checkbox" value="">
                @endif
            </div>
            <div class="genderOption col-sm-6 form-control d-flex justify-content-between align-items-center">
                <label for="female" class="col-sm-3 control-label">女</label>
                @if( Auth::user()->sex === 1)
                <input type="checkbox" name="male" id="male" class="checkbox" value="" checked>
                @else
                <input type="checkbox" name="male" id="male" class="checkbox" value="">
                @endif
            </div>
            <div class="genderOption col-sm-6 form-control d-flex justify-content-between align-items-center">
                <label for="others" class="col-sm-3 control-label">さらに</label>
                @if( Auth::user()->sex === 3)
                <input type="checkbox" name="male" id="male" class="checkbox" value="" checked>
                @else
                <input type="checkbox" name="male" id="male" class="checkbox" value="">
                @endif
            </div>

            <!-- <div class="form-group">
                <label for="exampleFormControlSelect2"></label>
                <select class="form-control" id="exampleFormControlSelect2">
                    <option>男</option>
                    <option>女</option>
                    <option>さらに</option>
                </select>
            </div> -->

        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">完了</button>
            </div>
        </div>
    </form>

    <script>
        // checkbox 
        $(".checkbox").on("click", function() {
            $('.checkbox').prop('checked', false); //  全部のチェックを外す
            $(this).prop('checked', true); //  押したやつだけチェックつける
        });
    </script>
</div>
@endsection