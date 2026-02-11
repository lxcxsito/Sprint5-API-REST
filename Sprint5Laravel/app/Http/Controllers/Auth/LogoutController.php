<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class LogoutController extends Controller{
    public function index(Request $request){
        if($request){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return redirect('/')->with('success', 'You have been logged out.');
        }

    }
}

?>