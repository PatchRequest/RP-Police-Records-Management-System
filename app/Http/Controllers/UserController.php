<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Rank;
use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware('role_or_permission:create users',['only' => ['create','store']]);
        $this->middleware('role_or_permission:edit users',['only' => ['destroy']]);
    }

    public function index()
    {
        $users = User::paginate(30);
        return view('User.userlist',[
            'users' => $users
        ]);
    }


    public function create()
    {
        $roles = Role::where('sort_order','>','1')->get();

        return view('User.create',[
            'roles' => $roles
        ]);
    }


    public function store()
    {
        $validated = request()->validate([
            'username' => ['required','min:3','unique:users,username'],
            'UID' => ['required','numeric','unique:users,UID'],
            'forum_id' => ['required','numeric']

        ]);


        $validated['creator_id'] = auth()->user()->id;

        $random = Str::random(8);
        session()->flash('message', "Das Password des neuen Benutzers ist: ".$random);
        $validated['password'] = Hash::make($random);


        $newUser = User::create($validated);

        $newUser->assignRole(Role::findById(request('role_id')));

        return redirect('/user/'.$newUser->id);
}


    public function show(User $user)
    {



        return view('User.show',[
            'user' => $user,
            'points' => $user->getPoints(),
            'comments' => Comment::where('receiver_id',$user->id)->paginate(5)
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
        if ($user->id == auth()->user()->id){
            session()->flash('message','Lass das! Sonst werde ich sauer! (╯°□°）╯︵ ┻━┻ ');
            return back();
        }
        $user->delete();

        return redirect('/');
    }


    public function passwordChange(){

        $user = auth()->user();
        $newpassword = "";


        if (request()->filled('password') && request()->filled('passwordAgain')){
            $validated = request()->validate([
                    'password' => 'min:8',
                    'passwordAgain' => ['min:8','same:password']

                ]
            );

            $newpassword = $validated['password'];
            session()->flash('message','Password wurde geändert');


        }else{
            $newpassword = Str::random(8);

            session()->flash('message','Das neue Password ist: '.$newpassword);



        }


        $user->password = Hash::make($newpassword);

        $user->save();

        return redirect('/news');

    }
}
