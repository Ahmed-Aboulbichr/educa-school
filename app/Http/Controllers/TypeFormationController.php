<?php

namespace App\Http\Controllers;

use App\Type_foramtion;
use App\Type_formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = DB::table('type_formations')->select('*')->get();
        return view('candidats.profil', compact('formations'));
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
     * @param  \App\Type_foramtion  $type_foramtion
     * @return \Illuminate\Http\Response
     */
    public function show(Type_formation $type_foramtion, $id)
    {
        $formation = Type_formation::findOrFail($id);
        $candidatures = DB::table('type_formations')
            ->join('formations', 'formations.type_formation_id', '=', 'type_formations.id')
            ->join('candidatures', 'formations.id', '=', 'candidatures.formation_id')
            ->join('candidats', 'candidatures.candidat_id', '=', 'candidats.id')
            ->where('type_formations.intitule', '=', $formation->intitule)
            ->select('candidatures.*', 'candidats.prenom_fr', 'candidats.nom_fr', 'formations.specialite')
            ->get();
        return view('admin.candidature.liste')->with('candidatures', $candidatures);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type_foramtion  $type_foramtion
     * @return \Illuminate\Http\Response
     */
    public function edit(Type_formation $type_foramtion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type_foramtion  $type_foramtion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type_formation $type_foramtion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type_foramtion  $type_foramtion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type_formation $type_foramtion)
    {
        //
    }
}
