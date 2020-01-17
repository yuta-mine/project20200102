  @extends('layouts.homelayout')
  <style>
      .dislikebtn {
          position: absolute;
          color: transparent;
          background-color: transparent;
          border: none;
      }

      .likebtn {
          position: absolute;
          color: #FD5068;
      }

      .btn_hidden {
          visibility: hidden;
      }

      .text-age {
          font-size: 20px;
      }
<<<<<<< HEAD

    .no_user {
        position: relative;
        top: 150px;
        left: 40px;
        
    }
=======

      .no_user {
          position: relative;
          top: 150px;
          left: 40px;
      }

      .dislike {
          text-decoration: none;
      }
>>>>>>> master
  </style>

  @section('content')

  <div class="topPage">
      <nav class="nav">
          <ul>
              <li class="personIcon">
                  <a href="/users/show/{{Auth::id()}}"><i class="fas fa-user"></i></a>
              </li>
              <li class="msgIcon">
                  <a href="/list"><i class="fas fa-comments"></i></a>
              </li>
          </ul>
      </nav>
      <div id="tinderslide">
          <ul>
              @foreach($users as $user)
              <!-- 変数名->テーブルの要素 という書き方で、データベーステーブル内の情報を表示 -->
              <!-- 自分をhomeに表示させないcontinue処理 -->
              @if($user->id == Auth::id())
              @continue
              @endif
              <li data-user_id="{{ $user->id }}">
                  @csrf
                  <!-- 写真 -->
                  <img src="/storage/images/{{ $user->img_name }}">
                  <!-- 名前 -->

                  <div class="username">{{ $user->name }} <span class="text-age">{{ $user->age }}</span></div>

                  <!-- 距離 -->
                  <div class="userdistance">{{ $user->distance }}</div>
                  <!-- 自己紹介 -->
                  <div class="selfintro">{{ $user->self_introduction }}</div>

                  <div class="like"></div>
                  <div class="dislike"></div>

              </li>
              @endforeach
              <div class="no_user">だれも近くにいません。</div>
          </ul>
      </div>

      <div class="actions" id="actionBtnArea">
          <!-- <a href="#" class="back"><i class="fas fa-times fa-2x"></i>戻る</a> -->
          <a href="#" class="dislike"><i class="fas fa-times fa-2x"></i>
              <button class="dislikebtn">NOPE</button>
          </a>
          <a id="likebtn_area" href=" #" class="like">

              @foreach($users as $user)
              @if($user->id == Auth::id())
              @continue
              @endif
              <button class="likebtn" value="{{ $user->id }}"><i class="fas fa-heart fa-2x"></i></button>
              @endforeach

          </a>
          <!-- <a href=" home_detail.blade" class="detail"><i class="fas fa-times fa-2x"></i>詳細</a> -->
      </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
      $('.likebtn').on('click', function() {
          //クリック時に一番上にあるボタンを隠す
          //var likebutton = this.innerText;
          var likebutton = this.getAttribute('value');
          //   $(this).addClass('btn_hidden');


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