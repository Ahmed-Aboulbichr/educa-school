<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class VillesController extends Controller
{
    public function renderVilles(Request $request)
    {
        if ($request->ajax()) {

            $villes = DB::table('villes')->select('name', 'id')->get();

            return  response()->json($villes, 200);
        }
    }
}
