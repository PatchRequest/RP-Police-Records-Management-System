<?php

namespace App\Http\Controllers;

use App\Rank;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        $ranks = Rank::all();
        return view('User.create',[
            'ranks' => $ranks
        ]);
    }


    public function store()
    {
        $validated = request()->validate([
            'username' => ['required','min:3','unique:users,username'],
            'UID' => ['required','numeric','unique:users,UID'],
            'forum_id' => ['required','numeric'],
            'rank_id' => ['required','numeric']
        ]);
        $validated['creator_id'] = auth()->user()->id;

        $random = Str::random(8);
        session()->flash('message', "Das Password des neuen Benutzers ist: ".$random);
        $validated['password'] = Hash::make($random);


        $newUser = User::create($validated);

        return redirect('/user/'.$newUser->id);
}


    public function show(User $user)
    {

        return view('User.show',[
            'user' => $user
        ]);
    }


    public function edit(User $user)
    {
        return redirect('/');
    }

    public function update(User $user)
    {
        return redirect('/');
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/');
    }
}
