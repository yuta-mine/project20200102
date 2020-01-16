<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 'middleware' => 'auth' と表記することで、認証済みかどうかを判定
Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
    Route::get('show/{id}', 'UserController@show')->name('users.show');
    Route::get('edit/{id}', 'UserController@edit')->name('users.edit');
    Route::post('update/{id}', 'UserController@update')->name('users.update');

    // 下記のルートを追加 ユーザーのセッティング画面に遷移する maru
    Route::get('show/{id}/setting', 'UserController@setting')->name('users.setting');
    // 下記のルートを追加 チャットルームへ移動する suke


});
// まずchat/{id}にmatchtableのidをぶち込む。<=マッチ画面から遷移するときに渡してもらう
// そしてChatController@〇〇に送って、そのcontroller内の〇〇関数で、マッチテーブルidを基に引っ張ってきた2つのuseridのユーザーのみのメッセージが表示されるチャットルームにリダイレクトする。

//Route::get('chat', 'ChatController@create');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/chat/{match_id}', function () {
        return view('chat');
    });
});


Auth::routes();

Route::get('/', function () {
    return view('top');
});

Route::get('/home', 'HomeController@index')->name('home');

// Home画面右上のアイコンを押すとマッチ一覧へ
Route::get('list', 'HomeController@list');



//likeしたidをReactionControllerのcreateメソッドに送信 mine
Route::group(['prefix' => 'home', 'middleware' => 'auth'], function () {
    Route::post('/', 'ReactionController@create')->name('users.like');
});


Route::get('ajax/chat', 'Ajax\ChatController@index');
// メッセージ一覧を取得
Route::post('ajax/chat', 'Ajax\ChatController@create');
// チャット登録

// 会員登録時のページ遷移しながらデータ保持して次へ行く処理 shino
Route::get('/name', 'Auth\RegisterController@name')->name('name');

Route::post('/birthday', 'Auth\RegisterController@birthday')->name('birthday');

Route::post('/gender', 'Auth\RegisterController@gender')->name('gender');

Route::post('/school', 'Auth\RegisterController@school')->name('school');

Route::post('/hobby', 'Auth\RegisterController@hobby')->name('hobby');

Route::get('/picture', 'Auth\RegisterController@picture')->name('picture');

Route::post('/register', 'Auth\RegisterController@create')->name('lastRegister');

// 会員登録時のページ遷移しながらデータ保持して次へ行く処理 ここまで shino
