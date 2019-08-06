<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
      'name','url'
    ];



    public function creator(){
        return $this->belongsTo(User::class,'creator_id')->withTrashed();
    }
}
