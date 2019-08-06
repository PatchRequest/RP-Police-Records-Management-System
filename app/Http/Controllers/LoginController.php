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

        if (Hash::check(request('password'), $possibleUser->password)) {

            Auth::login($possibleUser);
            return redirect('/');

        }

        session()->flash('message','Es ist ein Problem beim einloggen aufgetretten');
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect( '/');
    }
}
