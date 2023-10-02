<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function new_division(Request $request){
        //create ajax
        $this->create_division($request->name);
    }

    public function create_division($name){
        //create division DB
    }

    public function new_file(Request $request){
        for($i=0;$i<count($request->file_insert);$i++){
            $file = $request->file_insert[$i];
            $file_name  = $file->getClientOriginalName();
            $file_name = substr($file_name,0,-4);

            dd($request->divison);

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
        return view('usersettings',["user"=>$user]);
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

}