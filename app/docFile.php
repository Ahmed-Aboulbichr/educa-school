<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class docFile extends Model
{

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'type',
        'formation_id',
        'etudiant_id',
        'candidature_id',
        'candidat_id',
    ];








    //many to many relation ship
    public function responses()
    {
        return $this->belongsToMany(Reponse::class);
    }

    //one to many relation ships
    public function candidature()
    {
        return $this->belongsTo(Candidature::class);
    }

    public function candidat()
    {
        return $this->belongsTo(candidat::class, 'bac_id', 'id');
    }

    public function documents()
    {
        return $this->belongsTo(Document::class);
    }

    public function etudiants()
    {
        return $this->belongsTo(Etudiant::class);
    }


}
