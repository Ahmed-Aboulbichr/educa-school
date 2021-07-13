<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_formation extends Model
{
    protected $fillable = [
        'id',
        'intitule',
    ];

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }

}
