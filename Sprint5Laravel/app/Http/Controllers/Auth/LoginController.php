<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request -> validate ([
            'name' => 'required|string',
            'password' => 'required|string'
        ]); 

        if(Auth::attempt($credentials)){
            $request -> session() -> regenerate();
            return redirect()->route('home.index');
        }
        return back()->withErrors([
            'name' => 'Invalid Username'
        ]);
    }

}


?>