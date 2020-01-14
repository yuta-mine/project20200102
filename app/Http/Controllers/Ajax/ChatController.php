<?php

namespace App\Http\Controllers\Ajax;

use App\Message;
use App\Events\MessageCreated;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ChatController extends Controller
{

    public function index()
    { // 新着順にメッセージ一覧を取得
        return \App\Message::orderBy('id', 'asc')->get();
    }

    // protected $fillable = ['name'];
    // $flight = App\Flight::create(['name' => 'Flight 10']);
    public function create(Request $request)
    { // メッセージを登録
        // return response()->json($request->message);
        $message = \App\Message::create([
            'body' => $request->message,
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'img_name' => '/storage/images/'. Auth::user()->img_name,
            // 'img_name' => /storage/images/{{Auth::user()->img_name}},
        ]);
        event(new MessageCreated($message));
    }
}
