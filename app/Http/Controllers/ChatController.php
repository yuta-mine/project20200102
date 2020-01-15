<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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


    // チャットるーむ作成用
    public function create(){
        // ログインしてるユーザー取得
        $user = User::where('id', Auth::user()->id)->get();
        
        $liked_user = Match_table::all();
        $matches = Match_table::all();
        

    //     if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
    //         return redirect()->intended('home');
    //     }
    }
}
