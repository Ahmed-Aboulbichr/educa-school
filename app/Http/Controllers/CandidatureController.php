<?php

namespace App\Http\Controllers;

use App\Candidat;
use App\docFile;
use App\Formation;
use App\Candidature;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $candidatures = DB::table('candidatures')
            ->join('candidats', 'candidat_id', '=', 'candidats.id')
            ->join('formations', 'formation_id', '=', 'formations.id')
            ->select('candidatures.*', 'candidats.prenom_fr', 'candidats.nom_fr', 'formations.name')
            ->get();

        return view('admin.candidature.liste', compact('candidatures'));
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
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    public function show(Candidature $candidature)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    public function downloadPDF($id)
    {
        $candidat = Candidat::where('id', $id)->first();
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        set_time_limit(300);

        return $pdf->loadView('pre-inscription.attestationPDF', compact('candidat'))->stream();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    public function showPDF($id)
    {
        $candidat = Candidat::where('id', $id)->first();
        return view('pre-inscription.attestation')->with('candidat', $candidat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $candidat = Candidat::where('id', Candidature::where('id', $id)->first()->candidat_id)->first();

        return view('candidats.profil')->with('candidat', $candidat);
    }

    public function editValidation(Candidature $candidature, $id)
    {

        $candidature = Candidature::findOrFail($id);

        ($candidature->valide == 1) ? ($candidature->valide = 0) : ($candidature->valide = 1);

        $candidature->save();
        /*
            if($candidature->valide == 0){
                $candidature->valide = 1;
                $candidature->save();
                return redirect()->route('candidature.valide',$candidature->id);
            }
            if($candidature->valide == 1){
                return redirect()->route('candidatures.index');
            }
            */

        return redirect()->route('candidatures.index');
    }


    public function valide($id)
    {
        //to do : traitement d'envoyéer l'email
        return redirect()->route('candidatures.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidature $candidature)
    {
        dd(\App\Candidature::all());
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidature = Candidature::findOrFail($id);

        $candidature->delete();

        return redirect()->route('candidatures.index');
    }

    /* public function setValidate(Request $request){

        dd($request->get('id'));
        if($id=="1"){
            Candidature::where('id', $id)->update(array('valide' => '0'));
        }else{
            Candidature::where('id', $id)->update(array('valide' => '1'));
        }
    } */
}
