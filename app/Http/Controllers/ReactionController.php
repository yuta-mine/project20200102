<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reaction; //Reactionモデルを呼び出し
use App\User;
use Auth;
// use App\Http\Controllers\Controller;

// use App\Constant\Status;
use Log;

class ReactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');  //認証済みであれば表示、認証していなければ/loginにリダイレクト
    }

    public function create(Request $request)
    {
        // Log::debug($request); //requestできているか確認
        $reaction = new Reaction();

        //nameをto_user_idに登録
        $reaction->to_user = $request->dataval;

        //認証したidをfrom_userに登録
        $from_user = Auth::id();
        $reaction->from_user = $from_user;

        //送信したfrom_user、to_user_idをDBに保存
        $reaction->save();

        //home画面へ移動
        return ['data' => 'hoge'];
    }
}
