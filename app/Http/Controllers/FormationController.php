<?php

namespace App\Http\Controllers;

use App\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function renderFormations()
    {
            /*if ($request->ajax()) {

            $formations = Formation::with(['session','typeFormation', 'niveauEtude'])
            ->orderBy('niveau_etude_intitule')
            ->get();
            return  response()->json($formations, 200);
            }
            */

            $formations = DB::table('formations')
            ->join('sessions', 'session_id', '=', 'sessions.id')
            ->join('type_formations', 'type_formation_id', '=', 'type_formations.id')
            ->join('niveau_etudes', 'niveau_preRequise', '=', 'niveau_etudes.id')
            ->select(['formations.*','sessions.date_session','sessions.annee_univ','type_formations.designation','niveau_etudes.intitule'])
            ->whereNotIn('formations.id',function($query) {
                $candidat = Candidat::where('user_id', Auth::id())->latest()->first();
                $query->select('formation_id')->from('candidatures')->where('candidat_id',$candidat->id);
             })
            ->orderBy('sessions.date_session','DESC')
            ->orderBy('formations.dateLimite','ASC')
            ->get();

            return view('candidat.candidatures.formations', compact('formations'));

    }
}
