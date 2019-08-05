<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('User.login');
    }

    public function check(){

    }

    public function logout(){

    }
}
