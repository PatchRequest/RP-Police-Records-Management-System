<?php

namespace App\Http\Controllers;

use App\Rating;
use App\User;

class RatingController extends Controller
{
    public function __construct()
    {

        $this->middleware('role_or_permission:show ratings',['only' => ['index']]);
        $this->middleware('role_or_permission:delete ratings',['only' => ['destroy']]);
    }


    public function index()
    {
        $allRatings = Rating::paginate(50);

        return view('rating.overview',
            [
                'ratings' => $allRatings
            ]);
    }


    public function create()
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->sort_order = 0;
            foreach($user->role as $role){
                if($role->sort_order > $user->sort_order){
                    $user->sort_order =$role->sort_order;
                }
            }
        }

        $sortedUsers = $users->sortBy('sort_order');



        return view('rating.create', [
            'users' => $sortedUsers
        ]);
    }


    public function store()
    {

        if (request()->has('ask')) {

            request()->validate([
                'giver' => ['required'],
                'reason' => 'required'
            ]);


            $data = [
                'receiver_id' => auth()->user()->id,
                'giver_id' => request('giver'),

                'points_alg' => '0',
                'reason' => request('reason'),
                'confirmed' => false
            ];

        } else {

            request()->validate([
                'receiver' => ['required'],
                'points_alg' => 'required',
                'reason' => 'required'
            ]);

            switch (request('points_alg')) {
                case 'negativ':
                    $points_alg = -1;
                    break;
                case 'neutral':
                    $points_alg = 0;
                    break;
                case 'positiv':
                    $points_alg = 1;
                    break;
            }

            $data = [
                'receiver_id' => request('receiver'),
                'giver_id' => auth()->user()->id,

                'points_alg' => $points_alg,
                'reason' => request('reason'),
                'confirmed' => true
            ];
        }

        Rating::create($data);
        return redirect('/');

    }


    public function show(Rating $rating)
    {
        return view('rating.show', [
            'rating' => $rating
        ]);
    }

    public function forMe()
    {
        $openRatings = Rating::where('giver_id', auth()->user()->id)->where('confirmed', '0')->get();

        return view('rating.forMe', [
            'openRatings' => $openRatings
        ]);
    }

    public function update(Rating $rating)
    {

        $points_alg = 0;

        switch (request('points_alg')) {
            case 'negativ':
                $points_alg = -1;
                break;
            case 'neutral':
                $points_alg = 0;
                break;
            case 'positiv':
                $points_alg = 1;
                break;
        }

        $rating->points_alg = $points_alg;
        $rating->confirmed = true;

        $rating->save();

        return redirect('/');
    }

    public function destroy(Rating $rating)
    {
        $rating->delete();
        return redirect('/rating');
    }

    public function ask()
    {

        $users = User::all();

        foreach ($users as $user) {
            $user->sort_order = 0;
            foreach($user->role as $role){
                if($role->sort_order > $user->sort_order){
                    $user->sort_order =$role->sort_order;
                }
            }
        }

        $sortedUsers = $users->sortBy('sort_order');

        return view('rating.ask', [
            'users' => $sortedUsers
        ]);
    }
}
