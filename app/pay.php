<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pay extends Model
{
    //
    protected $fillable = [
        'name',
        'iso',
        'nicename',
        'iso3',
        'numcode',
        'pondecode'
    ];
}
