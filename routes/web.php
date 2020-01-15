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
    Route::get('chat/{id}',function(){
        return view('chat');
    });

    Route::get('gender/{id}', function(){
        return view('users.gender');
    });
    Route::post('genderEdit/{id}', function(){
        ddd($request);
    });

});

Auth::routes();

Route::get('/', function () {
    return view('top');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('ajax/chat', 'Ajax\ChatController@index');
// メッセージ一覧を取得
Route::post('ajax/chat', 'Ajax\ChatController@create');
// チャット登録
