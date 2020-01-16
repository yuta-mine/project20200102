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
    <div><i class="fas fa-comments"></i></div>
    <div class="title">Messages</div>
  </div>

  <div class="matches">
    <a href="" class="row">
      <div class="img"><img src="https://cdn.mainichi.jp/vol1/2019/05/09/20190509mog00m050005000p/11.jpg?2" alt=""></div>
      <div>
        <div class="name">さとみ</div>
        <div class="msg">こんにちはー！</div>
      </div>
    </a>
  </div>



</body>

</html>