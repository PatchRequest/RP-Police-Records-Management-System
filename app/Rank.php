<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    public $timestamps = [];

    protected $fillable = [
        'name'
    ];

    public function owner(){
        return $this->belongsToMany(User::class);
    }

}
