<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Match_table;  //Match_tableモデルの呼び出し

class ChatController extends Controller
{
    public function index(){
        $user = Auth::user();   #ログインユーザー情報を取得します。
        return view('chat', ['user' => $data]);
        return response()->json($data);

    //     $user = $request->user();
    //     $others = \App\User::where('id', '!=', $user->id)->pluck('name', 'id');
    //     return view('video_chat.index')->with([
    //         'user' => collect($request->user()->only(['id', 'name'])),
    //         'others' => $others
    //     ]);
    }


    // チャットるーむ作成用 $id=matchid
    public function create($id){
        // ログインしてるユーザー取得
        // $currentUserId = User::where('id', Auth::user()->id)->get();
        // $likedUserId = Match_table::exists('to_user', )
        $match = Match_table::find($id);
        $user1Id = $match->from_user;
        $user2Id = $match->to_user;
        if(Auth::user()->id == $user1Id || Auth::user()->id == $user2Id){
            return redirect()->intended('chat/{$id}');
        }else{
            return view('home');
        }
    //     if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
    //         return redirect()->intended('home');
    //     }
    }
}
