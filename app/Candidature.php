<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'labelle',
        'valide',
        'candidat_id',
        'formation_id',
    ];

    public function candidat(){
        return $this->belongsTo(Candidat::class);
    }
    public function formation(){
        return $this->belongsTo(Candidat::class);
    }
    
    public function docFiles(){

        $this->hasMany(docFile::class);
    }
}
