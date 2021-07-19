<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_formation extends Model
{
    protected $fillable = [
        'designation',
        'annees_post_bac'
    ];

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }

}
