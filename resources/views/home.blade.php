  @extends('layouts.homelayout')
  <style>
      /* form {
          position: absolute;
          bottom: 50px;
          left: 50px;
      } */

      /* 
      .form_hidden {
          visibility: hidden;
      } */
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
      <!-- <div id="tinderslide"> -->
      <!-- @csrf -->
      <ul>
          @foreach($users as $user)
          <!-- 変数名->テーブルの要素 という書き方で、データベーステーブル内の情報を表示 -->
          <li data-user_id="{{ $user->id }}">
              <p>{{ $user->id }}</p>
              <!-- <form action="{{ route('users.like')}}" method="POST"> -->
              @csrf
              <button name="name" value="{{ $user->id }}" class="likebtn" onclick="like()">{{ $user->id }}</button>
              <!-- </form> -->
              <!-- buttonをクリックすると、ルートusers.like（web.phpに定義）にidをpostする -->

              <!-- 写真 -->
              <!-- <img src="/storage/images/{{ $user->img_name }}"> -->
              <!-- 名前 -->
              <div class="userName">{{ $user->name }}</div>
              <!-- 年齢 -->
              <!-- <div class="userage">{{ $user->age }}</div> -->
              <!-- 距離 -->
              <!-- <div class="userdistance">{{ $user->distance }}</div> -->
              <!-- 自己紹介 -->
              <div class="selfintro">{{ $user->self_introduction }}</div>
              @endforeach
      </ul>
      <div class="like"></div>
      <div class="dislike"></div>
      </li>

  </div>

  <!-- <div class="noUser">近くにお相手がいません。</div> -->
  <!-- </div> -->
  <!-- <div class="actions" id="actionBtnArea">
          <a href="#" class="back"><i class="fas fa-times fa-2x"></i>戻る</a>
          <a href="#" class="dislike"><i class="fas fa-times fa-2x"></i>NOPE</a>
          <a href="#" class="like"><i class="fas fa-heart fa-2x"></i>LIKE</a>
          <a href="home_detail.blade" class="detail"><i class="fas fa-times fa-2x"></i>詳細</a>
      </div> -->


  <!-- </div> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
      function like() {
          //   var usersNum = $userCount;
          //   var from_user = $from_user;

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              }
          });

          const value = {
              likeval: $('.likebtn').val(),
          }

          $.ajax({
              dataType: 'json',
              url: '/api/like',
              type: 'POST',
              data: value,
          }).done(function(data) {
              console.log('success');
          }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
              console.log("ajax通信に失敗しました");
          });
      }
      // }

      //   $("#tinderslide").jTinder({
      //       onDislike: function(item) {
      //           currentUserIndex++;
      //           checkUserNum();
      //           var to_user = item[0].dataset.user_id
      //           postReaction(to_user, 'dislike')
      //       },
      //       onLike: function(item) {
      //           currentUserIndex++;
      //           checkUserNum();
      //           var to_user = item[0].dataset.user_id
      //           postReaction(to_user, 'like')
      //       },
      //       animationRevertSpeed: 200,
      //       animationSpeed: 400,
      //       threshold: 1,
      //       likeSelector: '.like',
      //       dislikeSelector: '.dislike'
      //   });
      //   $('.actions .like, .actions .dislike').click(function(e) {
      //       e.preventDefault();
      //       $("#tinderslide").jTinder($(this).attr('class'));
      //   });
  </script>

  @endsection