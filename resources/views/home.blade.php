  @extends('layouts.homelayout')
  <style>
      .likebtn,
      .dislikebtn {
          position: absolute;
          color: gray;
          background-color: skyblue;
      }

      .btn_hidden {
          visibility: hidden;
      }
  </style>

  @section('content')

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
                  @csrf
                  <!-- 写真 -->
                  <img src="/storage/images/{{ $user->img_name }}">
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
      </div>

      <div class="actions" id="actionBtnArea">
          <a href="#" class="back"><i class="fas fa-times fa-2x"></i>戻る</a>
          <a href="#" class="dislike"><i class="fas fa-times fa-2x"></i>
              <button class="dislikebtn">NOPE</button>
          </a>
          <a href="#" class="like"><i class="fas fa-heart fa-2x"></i>
              @foreach($users as $user)
              <button class="likebtn">{{ $user->id }}</button>
              @endforeach
          </a>
          <a href=" home_detail.blade" class="detail"><i class="fas fa-times fa-2x"></i>詳細</a>
      </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
      $('.likebtn').on('click', function() {
          //クリック時に一番上にあるボタンを隠す
          var likebutton = this.innerText;
          $(this).addClass('btn_hidden');

          // 認証確認
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              }
          });
          // ajaxでDBに登録
          $.ajax({
              dataType: 'json',
              url: '/api/like',
              type: 'POST',
              data: {
                  dataval: likebutton,

              },
          }).done(function(data) {
              console.log('success');
          }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
              console.log("ajax通信に失敗しました");
          });
      });
  </script>

  @endsection