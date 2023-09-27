<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function mygames(){
        if(Auth::id() == null){
            return redirect()->route('login');
        }
        else{
            $gm_rooms = DB::table('rooms')
            ->where('id_gm','=',Auth::id())
            ->get();

            $player_rooms = DB::table('participate as pt')
            ->where('id_player','=',Auth::id())
            ->join('rooms as rm','pt.id_room','=','rm.id')
            ->get();
            return view('mygames',["gm_rooms" => $gm_rooms,"player_rooms" => $player_rooms]);
        }
    }

    public function publish_room(Request $request){
        $code = $this->code($request);

        DB::table('rooms')
        ->insert([
            'room_name' => $request->name,
            'bg' => $request->color,
            'code'  => $code,
            'id_gm' => Auth::id(),
        ]);
        return redirect()->route('mygames');
    }

    public function code(Request $request){
        $name= $this->Clean_String( $request->name );
        $code = substr($name,0,3);
        $holder = substr($name,-3);
        for($i=0;$i<5;$i++){
            $random[$i] = rand(1,20);
            switch($random[$i]){
                case 20:
                    $random[$i] = "C20";
                break;

                case 1:
                    $random[$i] = "FC1";
                break;
            }
        }

        $code = strtoupper($code.implode($random).$holder);

        $check = DB::table('rooms')
        ->where('code','=',$code)
        ->first();

        if($check == null){
            return $code;
        }
        else{
            return $this->code($request);
        }
    }

    public function join_room(Request $request){
        session_start();

        $room = DB::table('rooms')
        ->where('code','=',$request->code)
        ->first();

        if($room != null){
            $check_participate = DB::table('participate')
            ->where('id_room','=',$room->id)
            ->where('id_player','=',Auth::id())
            ->first();


            if($check_participate == null){
                if($room->id_gm == Auth::id()){
                    $_SESSION['room']['mensagem']   = "You are the GM of this room";
                    return redirect()->route('mygames');
                }
                else{
                    DB::table('participate')
                    ->insert([
                        'id_room' => $room->id,
                        'id_player' => Auth::id(),
                        'permission' => 'player'
                    ]);
                    return redirect()->route('mygames');
                }
            }else{
                if($check_participate->permission == "ban"){
                    $_SESSION['room']['mensagem']   = "You have been banned from this room!";
                    return redirect()->route('mygames');}
                else{
                    $_SESSION['room']['mensagem']   = "You are alredy in this room";
                    return redirect()->route('mygames');}}
        }else{
            $_SESSION['room']['mensagem']   = "This room doesn't exist";
                return redirect()->route('mygames');
        }
    }

    function Clean_String($str)
    {
        $str = preg_replace('/[áàãâä]/ui', 'a', $str);
        $str = preg_replace('/[éèêë]/ui', 'e', $str);
        $str = preg_replace('/[íìîï]/ui', 'i', $str);
        $str = preg_replace('/[óòõôö]/ui', 'o', $str);
        $str = preg_replace('/[úùûü]/ui', 'u', $str);
        $str = preg_replace('/[ç]/ui', 'c', $str);
        $str = preg_replace('/_+/', '', $str);
        $str = preg_replace('/ /', '', $str);
        return $str;
    }


    function rooms($code){
        $room = DB::table('rooms')
        ->where('code','=',$code)
        ->first();

        if(!is_null($room)){
            $permission = DB::table('participate')
            ->where('id_room','=',$room->id)
            ->get();

            $check = false;
            foreach($permission as $holder){
                if($holder->id_player == Auth::id()){
                    $check = true;
                    break;
                }
            }

            if($room->id_gm == Auth::id()){
                $chat = DB::table('chat')
                ->where('id_room','=',$room->id)
                ->orderby('id','desc')
                ->get();
                $dm = true;
                return view('room',[
                    'room'  =>  $room,
                    'dm'    =>  $dm,
                    'chat'  =>  $chat,
                ]);
            }

            else if($check){
                $chat = DB::table('chat')
                ->where('id_room','=',$room->id)
                ->orderby('id','desc')
                ->get();
                $dm = false;
                return view('room',[
                    'room' =>  $room,
                    'dm'   => $dm,
                    'chat'  =>  $chat,
                ]);
            }
            else{
                session_start();
                $_SESSION['room']['mensagem']   = "You are not in this room!";
                    return redirect()->route('mygames');
            }
        }
        
    }
}
