<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
      'text','creator_id'
    ];

    public function creator(){
        return $this->belongsTo(User::class,'creator_id');
    }
}
