<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="jquery.ui.touch-punch.min.js"></script>
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
      text-align: center;
    }

    .picture_area {
      width: 95%;
      margin: 10px auto;
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;

    }

    input {
      outline: none;
      border: none;
      border-bottom: 2px solid rgb(230, 227, 227);
      width: 100%;
      height: 100%;
      font-size: 18px;
      padding-bottom: 5px;
    }


    .pic_uploader {
      opacity: 0;
      z-index: 1;
    }

    .drag {
      background: rgb(229, 237, 243);
      height: 100px;
      width: 25%;
      /* width: 100%; */
      position: relative;
      border-radius: 5px;
      border: 4px dashed rgb(192, 209, 219);
      margin: 7px;
    }

    .add {
      position: absolute;
      color: white;
      border-radius: 50%;
      background-color: deeppink;
      padding: 3px 5px;
      top: 77px;
      left: 57px;
    }

    .detail {
      display: block;
      text-align: center;
      width: 90%;
      margin: 30px auto
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
      width: 90%;
      border-bottom: 2px solid deeppink;
    }

    .drag img {
      width: 100%;
      height: 100%;
      position: relative;
      top: -107px;
    }

    .drop {
      background: rgb(229, 237, 243);
      height: 100px;
      width: 25%;
      position: relative;
      border-radius: 5px;
      border: 4px dashed rgb(192, 209, 219);
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
      top: 190px;
      left: 0;
      right: 0;
      bottom: 0;
    }

    .btn {
      text-align: center;
    }
  </style>
  <title>写真追加</title>
</head>

<body>
  <h2>空欄</h2>
  <div><i class="fas fa-angle-left"></i></div>
  <h1>写真を追加</h1>
  <div class="picture_area_wrapper">

    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="picture_area" id="sortableArea"></div>

      <!-- データ受け渡し用非表示部分 -->
      <input type="text" hidden name="name" value="{{$post_data->name}}">
      <input type="number" hidden name="age" value="{{$post_data->age}}">
      <input type="email" hidden name="email" value="{{$post_data->email}}">
      <input type="password" hidden name="password" value="{{$post_data->password}}">
      <input type="text" hidden name="sex" value="{{$post_data->sex}}">
      <input type="text" hidden name="school" value="{{$post_data->school}}">
      <input type="text" hidden name="hobby1" value="{{$post_data->hobby1}}">
      <input type="text" hidden name="hobby2" value="{{$post_data->hobby2}}">
      <input type="text" hidden name="hobby3" value="{{$post_data->hobby3}}">
      <input type="text" hidden name="hobby4" value="{{$post_data->hobby4}}">
      <input type="text" hidden name="hobby5" value="{{$post_data->hobby5}}">
      <!-- データ受け渡し用非表示部分 -->

      <div class="btn"><button type="submit">ログインする</button></div>
    </form>

  </div>

  <p class="detail">ホールド、ドラッグ、ドロップして写真を並べ替えることができます</p>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/hot-sneaks/jquery-ui.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
  <script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}" defer></script>
  <script>
    // 写真アップhtml表示
    for (let i = 1; i < 10; i++) {
      let picBoxes = [];
      picBoxes = '<div class="drag" id="' + i + '"><input type="file" class="pic_uploader p' + i + '"><img src="" alt="" class="thumbnail' + i + '"><div class="add">＋</div></div>';

      $('#sortableArea').append(picBoxes);
    };

    // 写真アップ->サムネイル表示処理
    for (let i = 1; i < 10; i++) {
      $('.p' + i).change(function() {
        if (this.files.length > 0) {
          // 選択されたファイル情報を取得
          var file = this.files[0];
          // readerのresultプロパティに、データURLとしてエンコードされたファイルデータを格納
          var reader = new FileReader();
          reader.readAsDataURL(file);

          reader.onload = function() {
            $('.thumbnail' + i).attr('src', reader.result);
          }
        }
      });
    };

    // sortable
    // nameを場所に応じて設定(読み込み時とsortable発動時)
    function picPositionAndName() {
      // for (let i = 3; i < 20; i += 2) {
      for (let i = 3; i < 20; i += 2) {

        console.log(Math.floor($('div').eq(i).offset().left));
        console.log(Math.floor($('div').eq(i).offset().top));

        // console.log($('div').eq(i).children('input').attr('name'));
        let x = Math.floor($('div').eq(i).offset().left);
        let y = Math.floor($('div').eq(i).offset().top);

        let picPosition = [{
            x: 34,
            y: 137,
            name: 'image'
          },
          {
            x: 137,
            y: 137,
            name: 'image2'
          },
          {
            x: 240,
            y: 259,
            name: 'image3'
          },
          {
            x: 34,
            y: 259,
            name: 'image4'
          },
          {
            x: 137,
            y: 259,
            name: 'image5'
          },
          {
            x: 240,
            y: 259,
            name: 'image6'
          },
          {
            x: 34,
            y: 381,
            name: 'image7'
          },
          {
            x: 137,
            y: 381,
            name: 'image8'
          },
          {
            x: 240,
            y: 381,
            name: 'image9'
          }
        ];
        $.each(picPosition,
          function(index, val) {
            if (x == val.x && y == val.y) {
              $('div').eq(i).children('input').attr('name', val.name);
            }
          }
        );
      }
    }
    // 読み込み時
    picPositionAndName();


    $(function() {
      $('#sortableArea').sortable({
        update: function(e, ui) {
          // sortable時
          picPositionAndName();
        }
      });
    });
  </script>
</body>

</html>