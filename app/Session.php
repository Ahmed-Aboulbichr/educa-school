<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'id',
        'anne_univ',
        'intitule',
    ];

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
}
