<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reaction;
use App\Match_table;
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

        $reaction = new Reaction();
        //nameをto_user_idに登録
        $reaction->to_user = $request->dataval;
        //認証したidをfrom_userに登録
        $from_user = Auth::id();
        $reaction->from_user = $from_user;
        //送信したfrom_user、to_user_idをDBに保存
        $reaction->save();


        // from_userカラムとto_userカラムに値が存在するか確認
        $get = $reaction->where([
            ['from_user', '=', $request->dataval],
            ['to_user', '=', Auth::id()],
        ])
            ->exists();

        // マッチテーブルにマッチIDを登録する。
        if ($get) {
            $match = new Match_table();
            $match->from_user = $request->dataval;
            $match->to_user = $from_user;
            $match->save();

            //マッチIDをchatルートで飛ばす
            $match_id = Match_table::select('id', '15')->get();
            return redirect()->route('/chat', $match_id);
        }

        // return view('profile'); //追加
        Log::debug($get); //requestできているか確認

        //home画面へ移動
        return ['data' => '$get'];
    }
}
