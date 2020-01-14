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
      padding: 30px 0 5px 0;
    }

    .hobby_area {
      width: 95%;
      margin: 20px auto;
      height: 30vh;
      padding: 0 0 10px 0;
      overflow-y: scroll;
      display: flex;
      flex-wrap: wrap;
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
      /* position: relative;
      top: 250px; */
    }

    .btn {
      text-align: center;
    }

    .skip {
      float: right;
    }

    p {
      width: 75%;
      margin: auto;
      font-size: 13px;
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
      width: 76%;
      border-bottom: 2px solid deeppink;
    }



    input[type=checkbox] {
      display: none;
    }

    .label {
      padding: 5px 10px;
      border: 2px solid rgb(168, 166, 166);
      border-radius: 14px;
    }

    .label_div {
      margin: 7px;
    }

    .flex {
      display: flex;
    }

    input[type=checkbox]:checked+.label_div>label {
      border: 2px solid deeppink;
      color: deeppink;
    }

    button:disabled {
      color: rgb(172, 169, 169);
      background: rgb(240, 239, 239);
    }
  </style>
  <title>趣味</title>
</head>

<body>
  <h2>空欄</h2>
  <div><i class="fas fa-angle-left"></i></div>
  <div class="skip">スキップする</div>
  <h1>つながろう<br>Tinderで</h1>
  <p>自分の好きな事をTinderで出会った友達にシェアしてみない？ここから選んでプロフィールにシェアしよう！</p>
  <form action="picture" method="get">
    {{ csrf_field() }}
    <div class="hobby_area">

    </div>

    <!-- データ受け渡し用非表示部分 -->
    <input type="text" hidden name="name" value="{{$post_data->name}}">
    <input type="number" hidden name="age" value="{{$post_data->age}}">
    <input type="email" hidden name="email" value="{{$post_data->email}}">
    <input type="password" hidden name="password" value="{{$post_data->password}}">

    <input type="text" hidden name="sex" value="{{$post_data->sex}}">
    <input type="text" hidden name="school" value="{{$post_data->school}}">
    <!-- データ受け渡し用非表示部分 -->

    <div class="btn"><button disabled>続ける</button>
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js "></script>
  <script>
    let hobby = [
      {
        value: 'camera',
        text: 'カメラ'
      },
      {
        value: 'eataround',
        text: '食べ歩き'
      },
      {
        value: 'running',
        text: 'ランニング'
      },
      {
        value: 'disney',
        text: 'ディズニー'
      },
      {
        value: 'netflix',
        text: 'Netflix'
      },
      {
        value: 'reading',
        text: '読書'
      },
      {
        value: 'indoor',
        text: 'インドア派'
      },
      {
        value: 'workout',
        text: 'ワークアウト'
      },
      {
        value: 'karaoke',
        text: 'カラオケ'
      },
      {
        value: 'walking',
        text: '散歩'
      },
      {
        value: 'comedy',
        text: 'お笑い'
      },
      {
        value: 'anime',
        text: 'アニメ'
      },
      {
        value: 'swimming',
        text: '水泳'
      },
      {
        value: 'travel',
        text: '旅行'
      },
      {
        value: 'movie',
        text: '映画鑑賞'
      },
      {
        value: 'fashion',
        text: 'ファッション'
      },
      {
        value: 'music',
        text: '音楽'
      },
      {
        value: 'cafe',
        text: 'カフェ巡り'
      },
      {
        value: 'newthings',
        text: '新しいもの好き'
      }
    ];
    // console.log(hobby.length);
    // console.log(hobby[0].value);
    let hobbyArray = [];
    for (let i = 0; i < hobby.length; i++) {
      hobbyArray += '<input type="checkbox" name="hobby" id ="' + hobby[i].value + '"value= "' + hobby[i].text + '"><div class="label_div"><label class="label" for="' + hobby[i].value + '">' + hobby[i].text + '</label></div>';
    }
    console.log(hobbyArray);
    $('.hobby_area').append(hobbyArray);

    //チェックボックスをクリックするとイベント発火
    $("input[type=checkbox]").click(function() {
      var count = $("input[type=checkbox]:checked").length;
      var not = $('input[type=checkbox]').not(':checked')

      //チェックが5つ付いたら、チェックされてないチェックボックスにdisabledを加える
      if (count >= 5) {
        not.attr("disabled", true);
      } else {
        //3つ以下ならisabledを外す
        not.attr("disabled", false);
      }
    });

    // ボタンにチェックされたボックスの数表示
    $('input:checkbox').change(function() {
      var cnt = $('input:checkbox:checked').length;
      // console.log(cnt);
      $('button').text('続ける　' + cnt + '/5');

    }).trigger('change');

    // チェック３個以上でボタンのdisabledがなくなる。以下ならdisabledがつく。
    $('input:checkbox').change(function() {
      var cnt = $('input:checkbox:checked').length;
      if (cnt > 2) {
        $('button').prop('disabled', false);
      } else {
        $('button').prop('disabled', true);
      }
    }).trigger('change');

    $('input:checkbox').on('click', function() {
      // console.log('click');
      let array = []
      array = $('input:checkbox:checked');
      for (let i = 0; i < 5; i++) {
        $('input:checkbox:checked').eq(i).attr('name', 'hobby' + Number(i + 1));
      }
      console.log(array);
    });
  </script>
</body>

</html>