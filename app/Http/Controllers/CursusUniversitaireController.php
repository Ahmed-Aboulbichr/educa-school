<?php

namespace App\Http\Controllers;

use App\Candidat;
use App\Cursus_universitaire;
use App\docFile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CursusUniversitaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidat = Candidat::where('user_id', Auth::user()->id)->get('id')->first();
        /* dd($candidat->id); */
        $cursus = Cursus_universitaire::where('candidat_id', $candidat->id)
            ->join('niveau_etudes', 'niveau_etude_id', '=', 'niveau_etudes.id')
            ->join('candidats', 'candidats.id', '=', 'candidat_id')
            ->select('niveau_etudes.*', 'cursus_universitaires.*', 'candidats.*')
            ->get();

        return view('candidats.parcours.parcours', compact('cursus', $cursus));

        /* $cursus = DB::table('cursus_universitaires') */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cursus_universitaire  $cursus_universitaire
     * @return \Illuminate\Http\Response
     */
    public function show(Cursus_universitaire $cursus_universitaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cursus_universitaire  $cursus_universitaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Cursus_universitaire $cursus_universitaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cursus_universitaire  $cursus_universitaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cursus_universitaire $cursus_universitaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cursus_universitaire  $cursus_universitaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cursus_universitaire $cursus_universitaire)
    {
        //
    }
}
