<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'annee_univ',
    ];

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
}
