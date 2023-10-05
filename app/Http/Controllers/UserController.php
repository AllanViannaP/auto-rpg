<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserTitle;
use App\Models\Users;

class UserController extends Controller

{
    public function usersettings(){
        $user=DB::table('users')
        ->where('id','=',Auth::id())
        ->first();
        $pretitle=DB::table('user_titles')
        ->where('order','=', 0)
        ->get();
        $title=DB::table('user_titles')
        ->where('order','=', 1)
        ->get();
        $atualpre=DB::table('user_titles')
        ->where('user_titles.id','=', $user->titlepre)
        ->first();
        $atualtitle=DB::table('user_titles')
        ->where('user_titles.id','=', $user->title)
        ->first();
        return view('usersettings',["user"=>$user, "atualpre"=>$atualpre, "atualtitle"=>$atualtitle, "pretitle"=>$pretitle, "title"=>$title]);
    }
    
    public function editinfo(){
        
    }

}
