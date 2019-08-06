<?php

namespace App\Http\Controllers;

use App\Rank;
use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{

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
        $user = User::orderBy('role_id')->get();

        return view('rating.create',[
            'users' => $user
        ]);
    }


    public function store()
    {

        if (request()->has('ask')){
            $data = [
                'receiver_id' => auth()->user()->id,
                'giver_id' => request('giver'),

                'points_alg' => '0',
                'reason' => request('reason'),
                'confirmed' => false
            ];

        } else {

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
                'reason' => '',
                'confirmed' => true
            ];
        }

        Rating::create($data);
        return redirect('/');

    }


    public function show( Rating $rating)
    {
        return view('rating.show',[
            'rating' => $rating
        ]);
    }


    public function forMe(){
        $openRatings = Rating::where('giver_id',auth()->user()->id)->where('confirmed','0')->get();


        return view('rating.forMe',[
            'openRatings' => $openRatings
        ]);
    }

    public function edit($id)
    {

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


    public function ask(){


        $user = User::orderBy('role_id')->get();




        return view('rating.ask',[
            'users' => $user
        ]);
    }
}
