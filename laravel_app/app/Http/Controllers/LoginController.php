<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login(Request $request){
        $incomingFields=$request->validate([
            'name' =>['required'],
            'password'=>['required'],
        ]);

        if(auth()->attempt(['name'=>$incomingFields['name'],'password'=>$incomingFields['password']])) {
            $request-> session()->regenerate();
        }
        return redirect('/');                
    }

    public function Logout(){
        Auth::logout();
        return redirect('/');
    }
}
