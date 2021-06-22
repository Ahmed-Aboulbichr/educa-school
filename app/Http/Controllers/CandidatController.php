<?php

namespace App\Http\Controllers;

use App\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatController extends Controller
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

    public function saveCandidatStepTow(Request $request){
        if ($request->ajax()) {
            $fields = $request->validate([
                'cin_pere' => ['bail', 'required', 'string', 'max:255'],
                'cin_mere' => ['bail','required', 'string', 'max:255'],
                'tel_parent' => ['bail','required', 'string', 'max:255']
            ]);
            $candidat = Candidat::where('user_id', Auth::id())->first();
            if(is_object($candidat)){
                $candidat = $candidat->update([
                    'CIN_pere' => $fields['cin_pere'],
                    'CIN_mere' => $fields['cin_mere'],
                    'tel_parent' => $fields['tel_parent'],
                ]);
                $response = [
                    "candidat" => $candidat,
                ];
                return response()->json($response, 200);
            }
            return response()->json("nothing to update",405);
        }
    }
}
