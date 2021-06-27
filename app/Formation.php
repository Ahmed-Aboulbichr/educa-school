<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];


     public function candidatures(){
        return $this->hasMany(Candidature::class);
    }  
}
