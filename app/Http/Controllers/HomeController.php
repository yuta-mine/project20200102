<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; //追加
use App\Match_table;
use Auth;
use Log;
use DB;

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
<<<<<<< HEAD
        $matchUserIDs = array();
        $matchIDs = array();
        $matchUserNames = array();
        $matchUserImages = array();

        //$matchIds = Match_table::all()->where('from_user', Auth::user()->id)->values('id')[0]->id;


        $checkExistsFromUser = DB::table('match_tables')->where('from_user', Auth::user()->id)->exists();

        if($checkExistsFromUser){
            // 自分がfrom_userカラムにいたら相手をto_userからさがす
            $matchesAll = Match_table::all()->where('from_user', Auth::user()->id);
            foreach ($matchesAll as $record) {
                $matcheID = $record->id;
                $targetUserId = $record->to_user;
                $targetUserRecord = User::Find($targetUserId);
                array_push($matchIDs, $matcheID);
                array_push($matchUserIDs, $targetUserId);
                array_push($matchUserNames, $targetUserRecord->name);
                array_push($matchUserImages, $targetUserRecord->img_name);
            }
        } elseif(!$checkExistsFromUser){
            // いなかったら自分をto_userからさがし、相手をfrom_userからさがす
            $matchesAll = Match_table::all()->where('to_user', Auth::user()->id);
            foreach ($matchesAll as $record) {
                $matcheID = $record->id;
                $targetUserId = $record->from_user;
                $targetUserRecord = User::Find($targetUserId);
                array_push($matchIDs, $matcheID);
                array_push($matchUserIDs, $targetUserId);
                array_push($matchUserNames, $targetUserRecord->name);
                array_push($matchUserImages, $targetUserRecord->img_name);
            }
        } else {
            echo 'ERROR at HomeController@list ';
        }

        return view('list',[
            'matchIds' => $matchIDs,
            'matchUserIDs' => $matchUserIDs, 
            'matchUserNames' => $matchUserNames, 
            'matchUserImages' => $matchUserImages
        ]);
=======
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
>>>>>>> master
        //return view('list');

    }
}
