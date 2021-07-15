<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
   
        'anne_univ',
        'date_session',
    ];

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
}
