<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Notifications\TwoFactorCode;

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
    protected $redirectTo = '/login';
    protected function redirectTo(){
        if( Auth()->user()->role == 1){
            return route('userProfile');
        }
        elseif( Auth()->user() == 2){
            return route('admin_index');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
 
        if( auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password'])) ){
 
         if( auth()->user()->role == 1 ){
            $user = auth()->user();
            $user->generateTwoFactorCode();
            $user->notify(new TwoFactorCode());
         }
         elseif( auth()->user()->role == 2 ){
             return redirect()->route('admin_index');
         }
 
        }else{
             Session::flash('invalid', 'Invalid credentials.');
            return redirect()->back()->withInput();
        }
     }
}
