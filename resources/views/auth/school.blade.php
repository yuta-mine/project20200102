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
      padding: 30px 0 50px 0;
    }

    .name_area {
      width: 75%;
      margin: auto;
    }

    input {
      outline: none;
      border: none;
      border-bottom: 2px solid rgb(148, 146, 146);
      width: 100%;
      font-size: 18px;
      padding-bottom: 5px;
    }

    .comment {
      font-size: 15px;
      padding-bottom: 20px;
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
      top: 250px;
    }

    .btn {
      text-align: center;
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
      width: 62%;
      border-bottom: 2px solid deeppink;
    }
  </style>
  <title>学校</title>
</head>

<body>
  <h2>空欄</h2>
  <div><a href="{{ route('login') }}"><i class="fas fa-times"></i></a></div>
  <h1>学歴</h1>
  <form action="hobby" method="POST">
    {{ csrf_field() }}
    <div class="name_area">
      <div><input type="text" name="school" placeholder="学校名"></div>
      <div class="comment">Tinderではこのように表示されます。</div>
    </div>

    <!-- データ受け渡し用非表示部分 -->
    <input type="text" hidden name="name" value="{{$post_data->name}}">
    <input type="number" hidden name="age" value="{{$post_data->age}}">
    <input type="email" hidden name="email" value="{{$post_data->email}}">
    <input type="password" hidden name="password" value="{{$post_data->password}}">

    <input type="text" hidden name="sex" value="{{$post_data->sex}}">
    <!-- データ受け渡し用非表示部分 -->

    <div class="btn"><button type="submit">スキップする</button></div>
  </form>

</body>

</html>