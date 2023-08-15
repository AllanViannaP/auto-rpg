<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Entities\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(){
        return view('register');}

    protected function registrate(Request $request){
        $user = User::where('email',$request->email)->first();
        session_start();
        if(isset($user)){
            $_SESSION['login_invalido']['mensagem']   = "This email is already being used";
            return redirect()->route('register');
        } else if($request->password != $request->password_confirmation){
            $_SESSION['login_invalido']['mensagem']   = "Passwords must be the same";
            return redirect()->route('register');
        } else if( $request->email == null ||$request->password == null 
                || $request->password_confirmation == null || $request->name == null){
                    $_SESSION['login_invalido']['mensagem']   = "Fill in all fields";
                    return redirect()->route('register');
        }else{
        DB::table('users')
        ->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        }
    }

}
