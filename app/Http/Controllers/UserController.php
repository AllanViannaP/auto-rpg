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
        dd($request->all());
        $check = $this->check_files($request);
        if($check){
            $i=0;
            foreach($request as $holder){
            DB::table('library')
            ->insert([
                'file'      => $holder->file_insert[$i],
                'division'  => $holder->divison,
                'type'      => 'algo',
                'id_user'   => Auth::id(),
            ]);

            $folder = "arquivos/recurso/ciclo_".$ciclo->id.'/'.$cpf->cpf;
            $request->file("documento_insert")[$var]->storeAs($nome_pasta, $doc_nome);
            $doc_caminho = 'recurso/ciclo_'.$ciclo->id.'/'.$cpf->cpf.'/'.$doc_nome;
            $i++;
            }
        }

        

        return ;
    }

    public function check_files($check){
        foreach($check->file_insert as $holder){
            $file = DB::table('library')
            ->where('id_user','=',Auth::id())
            ->where('file','=',$holder)
            ->select('file')
            ->first();

            if(!is_null($file)){
                dd($file);
            return false;}
        }
        return true;
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
        return view('library');
    }

}