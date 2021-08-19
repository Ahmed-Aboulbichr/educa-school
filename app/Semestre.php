<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    protected $fillable = [

        'session_id',
        'formation_id',
        'intitule_semestre',
    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }


    public function groupes()
    {
        return $this->hasMany(Groupe::class);
    }

}
