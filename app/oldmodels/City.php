<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
         'name'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function livingUser(){
        return $this->belongsTo(User::class);
    }
}
