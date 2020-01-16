<?php

namespace App;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;

class Reaction extends Model
{
    // use Notifiable;

    //reactionsテーブルに接続
    protected $table = 'like_tables';

    // fillableに設定したカラムのみ、create()やfill()、update()などで値が代入される
    // protected $fillable = [
    //     'id',
    //     'from_user',
    //     'to_user',
    //     'updated_at',
    //     'created_at',
    //     'status',
    // ];
}
