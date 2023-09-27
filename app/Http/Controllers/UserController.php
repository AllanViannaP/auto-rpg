<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function new_file(Request $request){
        $check = $this->check_files($request,$i=0);
        dd($check);
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
        dd($request->all());
    }

    public function check_this($check,$i){
        if($i<count($check->file_insert)){
            $file = $check->file_insert[$i];
            $file_name  = $file->getClientOriginalName();
            $file_name = substr($file_name,0,-4);
            
            $file = DB::table('library')
            ->where('id_user','=',Auth::id())
            ->where('file','=',$file_name)
            ->select('file')
            ->first();

            if(is_null($file)){
                return $this->check_files($check,$i+=1);
            }
            else{
                return false;
            }
        }
        else{
            return true;
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

        return view('library',['files' => $files]);
    }

}