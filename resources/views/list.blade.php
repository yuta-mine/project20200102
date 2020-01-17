<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <title>マッチ一覧</title>

    <style>
        * {
            padding: 0;
            margin: 0;
        }

        i {
            color: red;
            font-size: 52px;
            padding-top: 10px;
        }

        a {
            text-decoration: none;
            color: gray;
        }

        .header {
            border-bottom: 3px solid lightgray;
        }

        .header div {
            text-align: center;
        }

        .title {
            color: red;
            font-size: 20px;
            padding: 15px;
            font-weight: bold;
        }

        .img {
            width: 30%;
            /* height: 30%; */
            margin-left: 20px;
        }

        .img img {
            width: 70%;
            border-radius: 50%;
            height: 80px;
        }

        .row {
            display: flex;
            border-top: 1px solid rgb(243, 241, 241);
            border-bottom: 1px solid rgb(243, 241, 241);
            padding: 10px 0;
        }

        .user_wrapper {
            width: 93%;
            margin: auto;
        }

        .name {
            color: black;
            font-weight: bold;
        }

        .msg {
            color: gray;
        }
    </style>
</head>

<body>

    <div class="header">
        <!--  -->
        <div><a href="{{ url('/home') }}"><i class="fas fa-comments"></i></a></div>

        <div class="title">Messages</div>
    </div>


<<<<<<< HEAD
  <!-- もしくはcount($array) -->
  <div class="matches">
    @for ($i = 0; $i < count($matchUserNames) ; $i++) <div class="user">
        <a class="row" href="chat/{{ $matchIds[$i] }}">
          <div class="img"><img src="/storage/images/{{ $matchUserImages[$i] }}" alt=""></div>
          <div>
            <div class="name">{{ $matchUserNames[$i] }}</div>
            <div class="msg">こんにちはー！</div>
          </div>
        </a>
  </div>
  </div>
  @endfor
=======
    <!-- もしくはcount($array) -->
    <div class="matches">
        @for ($i = 0; $i < count($myMatchesName) ; $i++) <div class="user">

         
            <div class="row">
                <div class="img">
                    <a href="chat/{{ $matchIds }}">
                        <img src="/storage/images/{{ $myMatchesImage[$i] }}" alt="">
                    </a>
                </div>

                <div>
                    <div class="name">{{ $myMatchesName[$i] }}</div>
                    <div class="msg">こんにちはー！</div>
                </div>
      </div>
    </div>
    @endfor
>>>>>>> master





</body>

</html>
