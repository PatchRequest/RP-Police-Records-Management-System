<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(30);
        return view('User.userlist',[
            'users' => $users
        ]);
    }


    public function create()
    {
        return view();
    }


    public function store()
    {
        //
    }


    public function show(User $user)
    {
        return view();
    }


    public function edit(User $user)
    {
        //
    }


    public function update(User $user)
    {
        //
    }


    public function destroy(User $user)
    {
        //
    }
}
