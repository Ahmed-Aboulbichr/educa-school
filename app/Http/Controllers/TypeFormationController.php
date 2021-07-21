<?php

namespace App\Http\Controllers;

use App\Type_formation;
use Illuminate\Http\Request;

class TypeFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Type_formations = Type_formation::all();
        return view('admin.Type_formation.index', compact('Type_formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Type_formation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->session()->flash('operation','store');
        $request->validate([
            'session_id'=>'required',
            'annees_post_bac'=>'required'
        ]);

        Type_formation::create($request->all());
         return redirect()->route('type_formations.index')
         ->with('success','La Type_formation a été enregistrée') ;
    }

 /**
     * Display the specified resource.
     *
     * @param  \App\Type_formation  $Type_formation
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {
        $type_formation = Type_formation::findOrFail($id);
       /* $candidatures = DB::table('type_formations')
            ->join('formations', 'formations.type_formation_id', '=', 'type_formations.id')
            ->join('candidatures', 'formations.id', '=', 'candidatures.formation_id')
            ->join('candidats', 'candidatures.candidat_id', '=', 'candidats.id')
            ->where('type_formations.intitule', '=', $formation->intitule)
            ->select('candidatures.*', 'candidats.prenom_fr', 'candidats.nom_fr', 'formations.specialite')
            ->get();*/
        return view('admin.candidature.liste')->with('type_formation', $type_formation);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Type_formation = Type_formation::findOrFail($id);
        $response = [
            'Type_formation' => $Type_formation,
             'route' =>  route('type_formations.update',[$id])
        ];

        return response()->json($response, 200);
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
        $request->session()->flash('operation','update');
        $request->validate([
            'designation' => 'required',
            'annees_post_bac' => 'required'
        ]);

        Type_formation::where('id',$id)->update(
            [
                'designation' => $request->designation,
                'annees_post_bac' => $request->annees_post_bac

            ]
            );
        return redirect()->route('type_formations.index')
        ->with('success','La Type_formation a été modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Type_formation = Type_formation::findOrFail($id);
        $Type_formation->delete();
        return redirect()->route('type_formations.index')
        ->with('success','La Type_formation a été modifié');
    }

    public function renderTypeFormations(){
        $Type_formations = Type_formation::all();
        return  response()->json($Type_formations, 200);
    }    
}