<!DOCTYPE html>
<html lang="en">

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
        }

        button:disabled {
            color: rgb(172, 169, 169);
            background: rgb(240, 239, 239);
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
            width: 14%;
            border-bottom: 2px solid deeppink;
        }

        a {
            text-decoration: none;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <h2>空欄</h2>
    <div><i class="fas fa-times"></i></div>
    <!-- <header class="header"> -->
    <h1>表示ネーム</h1>
    <!-- </header> -->
    <form method="POST" action="birthday">
        {{ csrf_field() }}
        <!-- @csrf -->
        <div class="name_area">
            <div><input type="text" name="name" placeholder="名前"></div>
            <div class="comment">Tinderではこのように表示されます。</div>
        </div>
        <div class="btn">
            <button type="submit" disabled>続ける</button>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js "></script>
    <script>
        $('input[type="text"]').on('keyup', function() {
            // console.log($('input[type="text"]').val());
            if ($('input[type="text"]').val()) {
                $('button').prop('disabled', false);
            } else {
                $('button').prop('disabled', true);
            };
        });
    </script>
</body>