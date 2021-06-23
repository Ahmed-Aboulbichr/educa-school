<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SecteurProfessionController extends Controller
{
    public function renderSecteurs(Request $request)
    {
        if ($request->ajax()) {

            $secteurs = DB::table('secteur_professions')->select('name', 'id')->get();

            return  response()->json($secteurs, 200);
        }
    }
}
