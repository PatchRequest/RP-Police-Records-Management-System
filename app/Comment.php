<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
      'title','content','karma','receiver_id','creator_id'
    ];


    public function receiver(){
        return $this->belongsTo(User::class,'receiver_id');
    }

    public function creator(){
        return $this->belongsTo(User::class,'creator_id');
    }
}
