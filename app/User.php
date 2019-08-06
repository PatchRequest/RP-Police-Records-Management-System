<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable, SoftDeletes,HasRoles;



    protected $fillable = [
        'username', 'email', 'password','creator_id','UID','forum_id','rank_id'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function rank(){
        return $this->belongsTo(Rank::class,'rank_id');

    }

    public function creator(){
        return $this->belongsTo(User::class,'creator_id')->withTrashed();
    }

    public function getPoints(){

        $Qratings= Rating::where('receiver_id',$this->id)->where('confirmed','1')->get();


        $points = 0;
        foreach($Qratings as $rating ){
            $points += $rating->points_alg;
        }

        return $points;
    }

}
