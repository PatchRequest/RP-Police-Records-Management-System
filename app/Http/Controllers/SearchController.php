<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function publicSearch(){

        if(is_numeric(request('searched_name'))){
            $maybeUser = User::withTrashed()->where('UID',request('searched_name'))->first();

        } else {

            $maybeUser = User::where('username',request('searched_name'))->first();
        }


        if($maybeUser != null){
            return redirect('/user/'.$maybeUser->id);

        } else {
            session()->flash('message','User nicht gefunden');
            return back();
        }
    }
}
