<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login(Request $request){
        $incomingFields=$request->validate([
            'email' =>['required','email'],
            'password'=>['required','min:8','max:200'],
        ]);
        $incomingFields['password']=bcrypt($incomingFields['password']);
        auth()->Login($user);
        return redirect('/');
    }
}
