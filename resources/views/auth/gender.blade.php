<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <style>
    * {
      font-family: Arial, Helvetica, sans-serif;
      color: rgb(168, 166, 166);

    }

    body {
      width: 90%;
      margin: 20px auto;

    }

    .fas {
      font-size: 35px;
      color: rgb(228, 225, 225);
    }

    h1 {
      color: black;
      font-weight: lighter;
      width: 75%;
      margin: auto;
      padding: 30px 0 40px 0;
    }

    input {
      outline: none;
      border: none;
      border-bottom: 2px solid rgb(148, 146, 146);
      width: 100%;
      font-size: 18px;
      padding-bottom: 5px;
    }

    button {
      background: deeppink;
      border: none;
      color: white;
      width: 80%;
      border-radius: 40px;
      padding: 6px;
      font-size: 18px;
      text-align: center;
      padding: 12px 0;
      outline: none;
      cursor: pointer;
      position: relative;
      top: 230px;
      left: 0;
      right: 0;
      bottom: 0;
    }

    .btn {
      text-align: center;
    }

    .gender {
      border: 2px solid lightgray;
      width: 80%;
      margin: 5px auto;
      background: white;
      border-radius: 40px;
      padding: 12px;
    }

    form div {
      text-align: center;
    }

    .chkbox {
      top: 215px;
      position: relative;
    }

    /* ラベルのスタイル　*/
    .chkbox label {
      padding-left: 38px;
      /* ラベルの位置 */
      font-size: 13px;
      line-height: 32px;
      display: inline-block;
      cursor: pointer;
      position: relative;
    }

    /* ボックスのスタイル */
    .chkbox label:before {
      content: '';
      width: 25px;
      padding: 0 0 10px 0;
      height: 20px;
      display: inline-block;
      position: absolute;
      left: 0;
      /* top: 0px; */
      background-color: white;
      box-shadow: inset 0px 0px 3px 0px #000;
      border-radius: 3px;
    }

    /* 元のチェックボックスを表示しない */
    .chkbox input[type=checkbox] {
      display: none;
    }

    /* チェックした時のスタイル */
    .chkbox input[type=checkbox]:checked+label:before {
      content: '\2713';
      /* チェックの文字 */
      font-size: 20px;
      /* チェックのサイズ */
      color: #fff;
      /* チェックの色 */
      background-color: deeppink;
      /* チェックした時の色 */
    }

    .selected {
      color: deeppink;
      border: 2px solid deeppink;
    }

    h2 {
      color: transparent;
      border-bottom: solid 2px rgb(228, 225, 225);
      position: relative;
      font-size: 1px;
      position: relative;
      width: 100vw;
      left: -18px;
    }

    h2:after {
      content: "";
      display: block;
      line-height: 0;
      overflow: hidden;
      position: absolute;
      left: 0;
      bottom: -2px;
      width: 42%;
      border-bottom: 2px solid deeppink;
    }

    button:disabled {
      color: rgb(172, 169, 169);
      background: rgb(240, 239, 239);
    }
  </style>
  <title>性別</title>
</head>

<body>
  <h2>空欄</h2>
  <div><a href="{{ route('login') }}"><i class="fas fa-times"></i></a></div>
  <h1>性別</h1>
  <form action="school" method="post">
    <!-- これいないとexpiredってなって表示されない -->
    {{ csrf_field() }}
    <div class="gender">女性</div>
    <div class="gender">男性</div>
    <input hidden id="female" type="radio" name="sex" value="0">
    <input hidden id="male" type="radio" name="sex" value="1">
    <div class="chkbox">
      <input type="checkbox" id="profile_check" name="showgender" value="プロフィールに性別を表示する">
      <label for="profile_check">プロフィールに性別を表示する</label>
    </div>
    <!-- データ受け渡し用非表示部分 -->
    <input type="text" hidden name="name" value="{{$post_data->name}}">
    <input type="number" hidden name="age" value="{{$post_data->age}}">
    <input type="email" hidden name="email" value="{{$post_data->email}}">
    <input type="password" hidden name="password" value="{{$post_data->password}}">
    <!-- データ受け渡し用非表示部分 -->

    <div class="btn"><button disabled>続ける</button></div>
  </form>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js "></script>
  <script>
    $('.gender').on('click', function() {
      // console.log('click!');
      $(this).addClass('selected');
      $('button').prop('disabled', false);

      if ($(this).text() == '女性') {
        $(this).next('div').removeClass('selected');
        $('#female').prop('checked', true);
      } else {
        $(this).prev('div').removeClass('selected');
        $('#male').prop('checked', true);
      }
    });
  </script>
</body>

</html>