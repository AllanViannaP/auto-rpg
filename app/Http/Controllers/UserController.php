<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTitle;
use App\Models\Users;

class UserController extends Controller

{
    public function usersettings(){
        $user=DB::table('users')
        ->where('id','=',Auth::id())
        ->first();
        return view('usersettings',["user"=>$user]);
    }
    
    public function editinfo(){
        
    }
    
    public function titleselect()
    {
        return view('custom_selection');
    }

    public function getOptions($order){
        $options = UserTitle::where('order', $order)->get();
        return response()->json($options);
    }
    
    public function getSelectedOptions()
    {
        $user = Yser::find(1);
        return response()->json($user);
    }

    public function saveSelectedOptions(Request $request)
    {
        $data = $request->validate([
            'titlePre' => 'required',
            'title' => 'required',
        ]);

        $user->title_pre = $data['titlePre'];
        $user->title = $data['title'];
        $user->save();
        return response()-json(['message' => 'Selected options saved successfully']);
    }

    public function titlepre(){
        return $this->belongsTo(UserTitle::class, 'title_pre');
    }
    public function title(){
        return $this->belongsTo(UserTitle::class, 'title');
    }

}
