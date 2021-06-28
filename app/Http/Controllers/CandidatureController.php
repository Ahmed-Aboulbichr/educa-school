<?php

namespace App\Http\Controllers;

use App\Candidat;
use App\docFile;
use App\Formation;
use App\Candidature;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $candidatures = Candidature::all();

        return view('tables-editable', compact('candidatures'));
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
        $candidat = Candidat::where('id',$id )->first();
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


        $candidat = Candidat::where('id',$id )->first();
        return view('pre-inscription.attestation')->with('candidat', $candidat);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidature $candidature)
    {
        return redirect()->route('getPreInscr');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidature $candidature)
    {
        $candidature = Candidature::findOrFail($candidature->id);

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
