<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Http\Client;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(){
        return view ('auth.login.login');
    }

    public function verify_login(Request $request)
    {
        session_start();

        try
        {
            $user = User::where('email',$request->email)->first();
            if($user == null){
                $_SESSION['login_invalido']['mensagem']   = "Invalid email or password";
                return redirect()->route('login');
            } else{
                if(password_verify($request->password, $user->password)){
                    Auth::login($user);
                        return redirect()->route('index');
                } else{
                    $_SESSION['login_invalido']['mensagem']   = "Invalid email or password";
                    return redirect()->route('login');
                }
            }
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }
}
