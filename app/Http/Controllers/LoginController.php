<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        return view('Login.login');
    }

    public function check(){
        $possibleUser = User::where('username',request('username'))->get()->first();


        if($possibleUser == null){
            session()->flash('message','Der User existiert nicht!');
            return redirect('/login');
        }

        if (Hash::check(request('password'), $possibleUser->password)) {

            Auth::login($possibleUser);
            return redirect('/');

        }

        session()->flash('message','Das Passwort war falsch!');
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect( '/');
    }
}
