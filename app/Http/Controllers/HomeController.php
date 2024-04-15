<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //for checking email alredy registered or not
    public function checkEmail(Request $request)
    {
        
        $email = $request->input('email');
        $isExist = User::where('email', $email)->where('role', 1)->first();
        if($isExist){
             
            return response()->json(array("exists" => true));
        }
        else{
            return response()->json(array("exists" => false));
        }
    }
}
