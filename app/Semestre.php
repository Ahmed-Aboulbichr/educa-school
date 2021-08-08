<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    protected $fillable = [
        
        'session_id',
        'intitule',
    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
   
    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
   
}
