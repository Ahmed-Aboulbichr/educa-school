<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecteurProfessionController extends Controller
{
    public function renderPays(Request $request)
    {
        if ($request->ajax()) {

            $secteurs = DB::table('secteur_professions')->select('name', 'id')->get();

            return  response()->json($secteurs, 200);
        }
    }
}
