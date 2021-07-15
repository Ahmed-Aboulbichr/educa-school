<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_formation extends Model
{
    protected $fillable = [
        'id',
        'designation',
    ];

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }

}
