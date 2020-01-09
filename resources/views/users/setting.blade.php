@extends('layouts.app')
@section('content')
@push('css')
    <link href="{{ secure_asset('css/user.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/setting.css') }}" rel="stylesheet">
@endpush

<div class="panel-body">
    <!-- バリデーションエラーの表⽰に使⽤するエラーファイル-->
    <!-- タスク登録フォーム -->
    <form action="{{ route('users.update', $user->id)}}" method="POST" class="formhorizontal">
        @method('PUT')
        @csrf
        <h1>設定</h1>

        <div class="card-area">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">imgタグ</h3>
                    <div class="card-text">タップしたらモーダル</div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">imgタグ</h3>
                    <div class="card-text">タップしたらモーダル</div>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">imgタグ</h3>
                        <div class="card-text">タップしたらモーダル</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">imgタグ</h3>
                        <div class="card-text">タップしたらモーダル</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">

            <div id="account_setting" class="setting-block">
                <h2>アカウント設定</h2>

                <div class="col-sm-6 form-control d-flex justify-content-between align-items-center">
                    <label class="" for="">購入を復元: modal</label>
                </div>
                <div class="col-sm-6 form-control d-flex justify-content-between align-items-center">
                    <label class="" for="">メールアドレス</label>
                    <div class="d-flex justify-content-between">
                        <div id="email" class="form-item">いますぐ認証</div>
                        <a class="next-icon" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 form-control d-flex justify-content-between align-items-center">
                    <label class="" for="">電話番号</label>
                    <div class="d-flex justify-content-between">
                        <div id="phoneNumber" class="form-item">user->phoneNumber</div>
                        <a class="next-icon" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 form-primary">
                    <div class="form-control d-flex justify-content-between align-items-center">プロモーションコード: modal</div>
                </div>
                <div class="infotext">アカウントを保護するために、電話番号とEメールアドレスを認証してください。</div>
            </div>

            <div id="discovery_setting" class="setting-block">
                <h2>ディスカバリー設定</h2>
                <div id="app">
                    <!-- <p>
                        width: @{{getWidth}}
                    </p>
                    <div>
                        <vue-slider ref="slider"></vue-slider>
                    </div>
                    <p :style="{'word-break': 'break-all','width': getWidth}">
                    </p> -->

                    <div class="col-sm-6 form-control">
                        <div class="d-flex justify-content-between align-items-center">
                            <div id="distance">最長距離</div>
                            <div id="kilometer">@{{ getWidth }}km</div>
                        </div>
                        <div>
                            <!-- <vue-slider ref="slider" v-model="value1" :min="2" :max="161"></vue-slider> -->
                            <input type="text" name="distance" value="" style="display: none">
                            <!-- props を使えば value に値をぶちこめそう -->
                        </div>
                    </div>
                    <div class="col-sm-6 form-control d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center">探しているのは</div>
                        <div class="d-flex justify-content-between">
                            <div id="phoneNumber" class="form-item">女性</div>
                            <!-- $user->targetGender -->
                            <a class="next-icon" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <i class="fas fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 form-control">
                        <div class="d-flex justify-content-between align-items-center">年齢の範囲</div>
                        <div>
                            <!-- <vue-slider ref="slider" v-model="value2" :min="18" :max="55"></vue-slider> -->
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-6 form-primary">
                <div id="smartPhoto" class="form-control d-flex justify-content-between align-items-center">
                    <div>Tinder で表示する</div>
                    <div class="d-flex align-items-center">
                        <input type="checkbox" id="demo01" checked />
                        <label for="demo01" data-on-label="" data-off-label=""></label>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 form-primary">
                <label for="user_favorite" class="col-sm-3 control-label">性別</label>
                <input type="text" name="user_favorite" id="user_favorite" class="form-control" value="">
            </div>
        </div>

        <!-- タスク登録ボタン -->
        <!-- <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div> -->
    </form>
</div>
@endsection