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
}


    // public function create(Request $request)
    // { // メッセージを登録
    //     // return response()->json($request->message);
    //     $message = \App\Message::create([
    //         'body' => $request->message
    //     ]);
    //     event(new MessageCreated($message));
    // }
