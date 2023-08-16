<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function mygames(){
        $gm_rooms = DB::table('rooms')
        ->where('id_gm','=',Auth::id())
        ->get();

        $player_rooms = DB::table('participate as pt')
        ->where('id_player','=',Auth::id())
        ->join('rooms as rm','pt.id_room','=','rm.id')
        ->get();
        return view('mygames',["gm_rooms" => $gm_rooms,"player_rooms" => $player_rooms]);
    }

    public function publish_room(Request $request){
        DB::table('rooms')
        ->insert([
            'room_name' => $request->name,
            'bg' => $request->color,
            'id_gm' => Auth::id(),
        ]);
        return redirect()->route('mygames');
    }

    public function join_room(){

    }
}
