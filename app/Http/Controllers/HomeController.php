<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; //追加
use App\Match_table;
use Auth;
use Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');  //認証済みであれば表示、認証していなければ/loginにリダイレクト
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');

        $users = User::all(); //追加

        return view('home', compact('users')); //追加

    }
    public function list()
    {
        $match = Match_table::all();
        $myMatchesName = array();
        $myMatchesImage = array();
        $matchesAll = Match_table::all()->where('from_user', Auth::user()->id);
        foreach ($matchesAll as $record){
            $toUserId = $record->to_user;
            $toUserRecord = User::Find($toUserId);
            array_push($myMatchesName, $toUserRecord->name);
            array_push($myMatchesImage, $toUserRecord->img_name);
        }

        $matchIds = Match_table::all()->where
        ('from_user',Auth::user()->id)->values
        ('id')[0]->id;
        // ddd($matchIds);
        //$myMatches = array($myMatchesName, $myMatchesImage);
        // Log::debug($myMatchesName);
        // Log::debug($myMatchesImage);
        //ddd($myMatches[0][1]);
        // $data = $users->where('id', '>', 5)->get();
        //ddd($match);
        //$user = User::all();
        return view('list',['matchIds' => $matchIds,'myMatchesName' => $myMatchesName, 'myMatchesImage' => $myMatchesImage],);
        //return view('list');

    }
}
