<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        return view('User.login');
    }

    public function check(){
        $maybe_user = User::where('username',request('username'))->get()->first();


        if (Hash::check(request('password'), $maybe_user->password)) {

            Auth::login($maybe_user);
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
