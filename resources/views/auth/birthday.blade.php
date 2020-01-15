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



    .name_area {
      width: 75%;
      margin: auto;
    }

    input {
      outline: none;
      padding-left: 3px;
      border: none;
      border-bottom: 2px solid rgb(228, 225, 225);
      width: 100%;
      font-size: 22px;
      padding-bottom: 5px;
    }

    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type="number"] {
      -moz-appearance: textfield;
    }

    .comment {
      font-size: 15px;
      padding-bottom: 20px;
    }

    button {
      outline: none;
      background: deeppink;
      border: none;
      color: white;
      width: 80%;
      border-radius: 40px;
      padding: 6px;
      font-size: 18px;
      text-align: center;
      padding: 12px 0;
      cursor: pointer;
    }

    button:disabled {
      color: rgb(172, 169, 169);
      background: rgb(240, 239, 239);
    }

    .btn {
      text-align: center;
      margin-top: 10px;
    }

    .birthday {
      display: flex;
    }

    .input_parts {
      margin-right: 6px;
      caret-color: blue;
    }

    .slash {
      font-size: 25px;
      margin: 0 2px;
      line-height: 29px;
    }

    .month {
      width: 18px;
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
      width: 28%;
      border-bottom: 2px solid deeppink;
    }

    .margin {
      margin: 0;
    }
  </style>
  <title>誕生日</title>
</head>

<body>
  <h2>空欄</h2>
  <div><a href="{{ route('login') }}"><i class="fas fa-times"></i></a></div>
  <h1>年齢</h1>
  <form action="gender" method="post" id="form">
    {{ csrf_field() }}
    <div class="name_area">
      <div class="birthday">
        <input type="number" name="age">歳
      </div>
      <div class="comment">あなたの年齢が表示されます。</div>
      <h1 class="margin">Eメール</h1>
      <div class="birthday">
        <input type="email" name="email">
      </div>
      <h1 class="margin">パスワード</h1>
      <div class="birthday">
        <input type="password" name="password">
      </div>

    </div>
    <!-- データ受け渡し用非表示部分 -->
    <input type="text" hidden name="name" value="{{$post_data->name}}">
    <!-- データ受け渡し用非表示部分 -->
    <div class="btn"><button type="submit" disabled>続ける</button></div>
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js "></script>
  <script>
    $('input[name="age"]').on('blur', function() {

      // 20歳未満はじく
      if ($('input[name="age"]').val() < 20) {
        return false;
      }

    });

    // 全て入力->ボタンが押せる
    $('input').on('blur', function() {
      if ($('input[name="age"]').val() && $('input[name="email"]').val() && $('input[name="password"]').val()) {
        $('button').prop('disabled', false);
      } else {
        $('button').prop('disabled', true);
      }
    });
    // それぞれ1文字しか入力できない処理
    //   $('.input_parts').on('input', function(e) {
    //     var value = $(this).val()
    //     if (value > 1) {
    //       $(this).val(value.slice(0, 1))
    //     }
    //   });

    //   // 全部数字入れたらボタンが押せる処理
    //   let year = [];
    //   let month = [];
    //   let day = [];
    //   let birthday = [];
    //   $('input[type="number"]').on('keyup', function(e) {
    //     // console.log('change');
    //     for (let i = 0; i < 4; i++) {
    //       year += $('.year').eq(i).val();
    //       // console.log(year);
    //     }
    //     for (let j = 0; j < 2; j++) {
    //       month += $('.month').eq(j).val();
    //       // console.log(month);
    //     }
    //     for (let k = 0; k < 2; k++) {
    //       day += $('.day').eq(k).val();
    //       // console.log(day);
    //     }
    //     // console.log(year);
    //     // console.log(month);
    //     // console.log(day);
    //     console.log(year.length);
    //     console.log(month.length);
    //     console.log(day.length);
    //     let length = year.length && month.length && day.length;
    //     if (length) {
    //       $('button').prop('disabled', false);
    //     } else {
    //       $('button').prop('disabled', true);
    //     }
    //   });


    //   // 西暦バリデーション
    //   // --------------------------------------------------------------
    //   // 千    
    //   $('input[name="year1"]').on('keydown', function(e) {
    //     // console.log(e.keyCode);
    //     // 押したのが1のとき
    //     if (e.keyCode == 49) {
    //       // console.log('1です');
    //       $('input').css('caret-color', 'blue');
    //       // 押したのが2のとき
    //     } else if (e.keyCode == 50) {
    //       // console.log('2です');
    //       $('input').css('caret-color', 'blue');
    //     } else if (e.keyCode == 8) {
    //       // console.log('backspace');
    //     } else if (e.keyCode == 9) {
    //       // console.log('tab');
    //     } else {
    //       console.log('1と2以外です');
    //       $('input').css('caret-color', 'red');
    //       return false;
    //     }

    //   });

    //   //百
    //   $('input[name="year2"]').on('keydown', function(e) {
    //     // 押したのが0のとき
    //     if (e.keyCode == 48) {
    //       if ($('input[name="year1"]').val() == 2) {
    //         // console.log('ok');
    //         $('input').css('caret-color', 'blue');
    //       } else {
    //         $('input').css('caret-color', 'red');
    //         return false;
    //       }
    //       //  押したのが9のとき
    //     } else if (e.keyCode == 57) {
    //       if ($('input[name="year1"]').val() == 1) {
    //         // console.log('ok');
    //         $('input').css('caret-color', 'blue');
    //       } else {
    //         $('input').css('caret-color', 'red');
    //         return false;
    //       }
    //     } else if (e.keyCode == 8) {
    //       $('input').css('caret-color', 'blue');
    //       // console.log('backspace');
    //     } else if (e.keyCode == 9) {
    //       $('input').css('caret-color', 'blue');
    //       // console.log('tab');
    //     } else {
    //       // console.log('0と9以外です');
    //       $('input').css('caret-color', 'red');
    //       return false;
    //     }

    //   });

    //   // 入力が2つ以上にさせたくないがなってまう
    //   $('input[name="year2"]').on('keyup', function(e) {
    //     //  console.log($('input[name="year2"]').val().length);
    //     if ($('input[name="year2"]').val().length > 1) {
    //       // console.log($('input[name="year2"]').val().length);
    //       $('input[name="year2"]').val($('input[name="year2"]').val().slice(0, 1))
    //     }
    //   });


    //   // 十と一の位
    //   $('input[name="year3"]').on('keydown', function(e) {
    //     if ($('input[name="year2"]').val() == 0) {
    //       //  2000年代か
    //       if (e.keyCode == 48) {
    //         $('input').css('caret-color', 'blue');
    //         // console.log('ok');
    //       } else if (e.keyCode == 8) {
    //         $('input').css('caret-color', 'blue');
    //         // console.log('backspace');
    //       } else if (e.keyCode == 9) {
    //         $('input').css('caret-color', 'blue');
    //         // console.log('tab');
    //       } else {
    //         $('input').css('caret-color', 'red');
    //         return false;
    //       }
    //     } else {
    //       // 1900年代か
    //       $('input').css('caret-color', 'blue');
    //       // console.log('ok');
    //     }
    //   });

    //   // 2つ以上入力を拒否。なぜか先頭が2だと最初の処理が効かない
    //   $('input[name="year3"]').on('keyup', function(e) {
    //     //  console.log($('input[name="year2"]').val().length);
    //     if ($('input[name="year3"]').val().length > 1) {
    //       // console.log($('input[name="year2"]').val().length);
    //       $('input[name="year3"]').val($('input[name="year3"]').val().slice(0, 1))
    //     }
    //   });

    //   $('input[name="year4"]').on('keydown', function(e) {
    //     if ($('input[name="year1"]').val() == 2) {
    //       $('input').css('caret-color', 'red');
    //       return false;
    //     } else if (e.keyCode == 8) {
    //       $('input').css('caret-color', 'blue');
    //       // console.log('backspace');
    //     } else if (e.keyCode == 9) {
    //       $('input').css('caret-color', 'blue');
    //       // console.log('tab');
    //     } else {
    //       $('input').css('caret-color', 'blue');
    //       // console.log('ok');
    //     };
    //   });

    //   // ---------------------------------------------------------------
    //   // 月
    //   $('input[name="month1"]').on('keydown', function(e) {
    //     if (e.keyCode == 48) {
    //       // console.log('1から9月');
    //       $('input').css('caret-color', 'blue');
    //     } else if (e.keyCode == 49) {
    //       // console.log('10から12月');
    //       $('input').css('caret-color', 'blue');
    //     } else if (e.keyCode == 8) {
    //       // console.log('backspace');
    //       $('input').css('caret-color', 'blue');
    //     } else if (e.keyCode == 9) {
    //       // console.log('tab');
    //       $('input').css('caret-color', 'blue');
    //     } else {
    //       // console.log('error');
    //       $('input').css('caret-color', 'red');
    //       return false;
    //     };

    //     if ($('input[name="month2"]').val() == 0 || $('input[name="month2"]').val() == 1 || $('input[name="month2"]').val() == 2) {
    //       $('input').css('caret-color', 'blue');
    //       // console.log('10か11か12月');
    //     } else if (e.keyCode == 8) {
    //       $('input').css('caret-color', 'blue');
    //       // console.log('backspace');
    //     } else if (e.keyCode == 9) {
    //       $('input').css('caret-color', 'blue');
    //       // console.log('tab');
    //     } else {
    //       $('input').css('caret-color', 'red');
    //       return false;
    //     };
    //   });

    //   $('input[name="month2"]').on('keydown', function(e) {
    //     // console.log(e.keyCode);
    //     if ($('input[name="month1"]').val() == '') {
    //       // console.log('まだ10の位がない');
    //     } else if ($('input[name="month1"]').val() == 0) {
    //       if (e.keyCode == 48) {
    //         // console.log('00月');
    //         $('input').css('caret-color', 'red');
    //         return false;
    //       } else {
    //         // console.log('1から9月のどれか');
    //         $('input').css('caret-color', 'blue');
    //       }
    //     } else if ($('input[name="month1"]').val() == 1) {
    //       if (e.keyCode == 51 || e.keyCode == 52 || e.keyCode == 53 || e.keyCode == 54 || e.keyCode == 55 || e.keyCode == 56 || e.keyCode == 57) {
    //         // console.log('error: 存在しない月');
    //         $('input').css('caret-color', 'red');
    //         return false;
    //       } else {
    //         // console.log('10か11か12月');
    //         $('input').css('caret-color', 'blue');
    //       }
    //     } else if (e.keyCode == 8) {
    //       $('input').css('caret-color', 'blue');
    //       // console.log('backspace');
    //       $('input').css('caret-color', 'blue');
    //     } else if (e.keyCode == 9) {
    //       $('input').css('caret-color', 'blue');
    //       // console.log('tab');
    //     } else {
    //       $('input').css('caret-color', 'blue');
    //       // console.log('ok');
    //     };
    //   });

    //   // ---------------------------------------------------------------------------
    //   // 日（十の位）
    //   $('input[name="day1"]').on('keydown', function(e) {
    //     if ($('input[name="month1"]').val() == 0 &&
    //       $('input[name="month2"]').val() == 2 &&
    //       e.keyCode == 51) {
    //       $('input').css('caret-color', 'red');
    //       return false;

    //     }

    //     if (e.keyCode == 48 || e.keyCode == 49 || e.keyCode == 50 || e.keyCode == 51) {
    //       // console.log('0か1か2か3');
    //       $('input').css('caret-color', 'blue');
    //     } else if (e.keyCode == 8) {
    //       // console.log('backspace');
    //       $('input').css('caret-color', 'blue');
    //     } else if (e.keyCode == 9) {
    //       // console.log('tab');
    //       $('input').css('caret-color', 'blue');
    //     } else {
    //       // console.log('error');
    //       $('input').css('caret-color', 'red');
    //       return false;
    //     };
    //   });
    //   // ---------------------------------------------------------------------------
    //   // 日（一の位）
    //   $('input[name="day2"]').on('keydown', function(e) {

    //     if ($('input[name="day1"]').val() == 0) {
    //       if (e.keyCode == 48) {
    //         // console.log('00日');
    //         $('input').css('caret-color', 'red');
    //         return false;
    //       }
    //     } else if (
    //       $('input[name="day1"]').val() == 1 ||
    //       $('input[name="day1"]').val() == 2
    //     ) {
    //       // console.log('ok');
    //       $('input').css('caret-color', 'blue');
    //     } else if (
    //       $('input[name="day1"]').val() == 3 &&
    //       $('input[name="month1"]').val() == 0 &&
    //       $('input[name="month2"]').val() == 2
    //     ) {
    //       // console.log('2月');
    //       $('input').css('caret-color', 'red');
    //       return false;
    //     } else if (
    //       $('input[name="month1"]').val() == 0 && $('input[name="month2"]').val() == 4 && $('input[name="day1"]').val() == 3 ||
    //       $('input[name="month1"]').val() == 0 && $('input[name="month2"]').val() == 6 && $('input[name="day1"]').val() == 3 ||
    //       $('input[name="month1"]').val() == 0 && $('input[name="month2"]').val() == 9 && $('input[name="day1"]').val() == 3 ||
    //       $('input[name="month1"]').val() == 1 && $('input[name="month2"]').val() == 1 && $('input[name="day1"]').val() == 3
    //     ) {
    //       if (e.keyCode != 48 && e.keyCode != 8 && e.keyCode != 9) {
    //         // console.log('error: 無効な日付');
    //         $('input').css('caret-color', 'red');
    //         return false;
    //       }

    //     } else if (
    //       $('input[name="month1"]').val() == 0 && $('input[name="month2"]').val() == 1 && $('input[name="day1"]').val() == 3 ||
    //       $('input[name="month1"]').val() == 0 && $('input[name="month2"]').val() == 3 && $('input[name="day1"]').val() == 3 ||
    //       $('input[name="month1"]').val() == 0 && $('input[name="month2"]').val() == 5 && $('input[name="day1"]').val() == 3 ||
    //       $('input[name="month1"]').val() == 0 && $('input[name="month2"]').val() == 7 && $('input[name="day1"]').val() == 3 ||
    //       $('input[name="month1"]').val() == 0 && $('input[name="month2"]').val() == 8 && $('input[name="day1"]').val() == 3 ||
    //       $('input[name="month1"]').val() == 1 && $('input[name="month2"]').val() == 0 && $('input[name="day1"]').val() == 3 ||
    //       $('input[name="month1"]').val() == 1 && $('input[name="month2"]').val() == 2 && $('input[name="day1"]').val() == 3
    //     ) {
    //       if (e.keyCode != 48 && e.keyCode != 49 && e.keyCode != 8 && e.keyCode != 9) {
    //         // console.log('error: 無効な日付');
    //         $('input').css('caret-color', 'red');
    //         return false;
    //       }
    //     } else if (
    //       $('input[name="month1"]').val() == '' ||
    //       $('input[name="month2"]').val() == ''
    //     ) {
    //       // console.log('月が入力されていない');
    //     } else {
    //       // console.log('error');
    //       $('input').css('caret-color', 'red');
    //       return false;
    //     };
    //   });
    // 
  </script>
</body>

</html>