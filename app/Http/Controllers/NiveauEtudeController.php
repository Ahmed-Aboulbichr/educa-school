<?php

namespace App\Http\Controllers;

use App\Niveau_etude;
use App\Session;
use Illuminate\Http\Request;

class NiveauEtudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $niveaux = Niveau_etude::all();

        return view('admin.niveau_etude.index', ['niveaux' => $niveaux]);
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
        $request->session()->put('operation', 'store');
        $request->validate([
            'intitule' => 'required'
        ]);

        Niveau_etude::create([
            'intitule' => $request->get('intitule')
        ]);

        return redirect()->route('niveau_etudes.index')->with('success', 'niveau d\'études bien enregistrées');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Niveau_etude  $niveau_etude
     * @return \Illuminate\Http\Response
     */
    public function show(Niveau_etude $niveau_etude)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Niveau_etude  $niveau_etude
     * @return \Illuminate\Http\Response
     */
    public function edit(Niveau_etude $niveau_etude)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Niveau_etude  $niveau_etude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Niveau_etude $niveau_etude)
    {
        $request->session()->put('operation', 'update');

        $request->validate([
            'intitule' => 'required'
        ]);

        $niveau_etude->update($request->all());

        return redirect()->route('niveau_etudes.index')->with('success', 'modification valide');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Niveau_etude  $niveau_etude
     * @return \Illuminate\Http\Response
     */
    public function destroy(Niveau_etude $niveau_etude)
    {
        $niveau_etude->delete();

        return redirect()->route('niveau_etudes.index')->with('success', 'suppression valide');
    }

    public function renderNiveau()
    {
        $Niveau = Niveau_etude::all();
        return  response()->json($Niveau, 200);
    }
}
