<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Rating extends Model
{
    protected $fillable = [
        'receiver_id','giver_id','points_alg','confirmed','reason'
    ];


    public function receiver(){
        return $this->belongsTo(User::class,'receiver_id');
    }

    public function giver(){
        return $this->belongsTo(User::class,'giver_id');
    }

}
