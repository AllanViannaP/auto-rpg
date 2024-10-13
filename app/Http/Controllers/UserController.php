<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserTitle;
use App\Models\Users;

class UserController extends Controller
{

    public function new_division(Request $request){
        $divisions = DB::table('division_library')
        ->where('division','=',$request->name)
        ->first();
        if(is_null($divisions)){
            $this->create_division($request->name);
            return "true";            
        }else{
            return "false";
        }
    }

    public function create_division($name){
        DB::table('division_library')
            ->insert([
                'division'  => $name,
                'id_player'   => Auth::id(),
            ]);
        return true;
    }

    public function new_file(Request $request){
        for($i=0;$i<count($request->file_insert);$i++){
            $file = $request->file_insert[$i];
            $file_name  = $file->getClientOriginalName();
            $file_name = substr($file_name,0,-4);

            dd($request->all());

            DB::table('library')
            ->insert([
                'file'      => $file_name,
                'division'  => $request->divison,
                'type'      => $file->getClientOriginalExtension(),
                'id_user'   => Auth::id(),
            ]);

            $folder = "files/".$request->division."/user_".Auth::id();
            $request->file("file_insert")[$i]->storeAs($folder, $file->getClientOriginalName());

            return redirect()->route('libary');
        }
    }

    public function check_files(Request $request){
        $name = substr($request->file,0,-4);
        $file = DB::table('library')
            ->where('id_user','=',Auth::id())
            ->where('file','=',$name)
            ->select('file')
            ->first();
            if(is_null($file)){
                return true;
            }else{
                return false;
            }
    }

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
        return 1;
    }

    public function library(){
        $files = DB::table('library')
        ->where('id_user','=',Auth::id())
        ->get();

        $division = DB::table('division_library')
        ->where('id_player','=',Auth::id())
        ->get();

        if($division == "[]"){
            DB::table('division_library')
            ->insert([
                'division'  => "New Division",
                'id_player'   => Auth::id(),
            ]);
            return redirect()->route('library');
        }

        return view('library',['files' => $files, 'division' => $division]);
    }
    public function profilesave(Request $request){
        
    }

}