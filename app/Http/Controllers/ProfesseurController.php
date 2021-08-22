<?php

namespace App\Http\Controllers;

use App\Matiere;
use App\Professeur;
use App\Professeur_Matiere;
use App\User;
use App\ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professeurs =  Professeur::all();

        $villes = ville::all();

        $matieres = Matiere::all();

        return view('admin.professeur.index', compact('professeurs', 'villes', 'matieres'));
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

        $request->getSession()->put('operation', 'store');

        $request->validate([
            "matricule" => "required|unique:professeurs,matricule|string|max:30",
            "nom" => "required|string|max:50",
            "prenom" => "required|string|max:50",
            "etat_civile" => "required|string",
            "sexe" => "required|string",
            "tel" => "required|numeric",
            "adresse" => "required",
            "ville_id" => ['required', 'numeric', Rule::exists('villes', 'id')->where('id', $request->input('ville_id'))],
            "matiere_id.*" => ['required', 'numeric', Rule::exists('matieres', 'id')->where('id', $request->input('matiere_id'))],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8']
        ]);

        $user = User::create([
            'firstName' => $request->input('nom'),
            'lastName' => $request->input('prenom'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        $user->assignRole('professeur');

        $prof = Professeur::create([
            'matricule' => $request->input('matricule'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'etat_civile' => $request->input('etat_civile'),
            'sexe' => $request->input('sexe'),
            'tel' => $request->input('tel'),
            'adresse' => $request->input('adresse'),
            'ville_id' => $request->input('ville_id'),
            'user_id' => $user->id
        ]);

        $prof->matieres()->attach($request->input('matiere_id'));

        return redirect()->route('professeurs.index')->with('succes', 'Professeur' . $prof->nom . ' ajouté avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    public function affiche($professeur)
    {

        $prof = Professeur::where('user_id', $professeur)->first();

        $villes = ville::all();

        $matieres = Matiere::all();

        if ($prof == null) {
            return view('professeur.professeur.addProf', compact('villes', 'matieres'));
        }

        $villePro = ville::where('id', $prof->ville_id)->first();

        $matiere = $prof->matieres;

        return view('professeur.professeur.index', compact('prof', 'villePro', 'matiere', 'villes', 'matieres'));
    }
    public function insert(Request $request)
    {

        $request->getSession()->put('operation', 'store');

        $request->validate([
            "matricule" => "required|unique:professeurs,matricule|string|max:30",
            "nom" => "required|string|max:50",
            "prenom" => "required|string|max:50",
            "etat_civile" => "required|string",
            "sexe" => "required|string",
            "tel" => "required|numeric",
            "adresse" => "required",
            "ville_id" => ['required', 'numeric', Rule::exists('villes', 'id')->where('id', $request->input('ville_id'))],
            "matiere_id.*" => ['required', 'numeric', Rule::exists('matieres', 'id')->where('id', $request->input('matiere_id'))]
        ]);

        $prof = Professeur::create([
            'matricule' => $request->input('matricule'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'etat_civile' => $request->input('etat_civile'),
            'sexe' => $request->input('sexe'),
            'tel' => $request->input('tel'),
            'adresse' => $request->input('adresse'),
            'ville_id' => $request->input('ville_id'),
            'user_id' => Auth::user()->id,
        ]);

        $prof->matieres()->attach($request->input('matiere_id'));

        return redirect()->route('professeur', ['professeur' => $prof->user_id]);
    }
    public function modify(Request $request, $professeur)
    {

        $request->validate([
            "matricule" => "required|string|max:30",
            "nom" => "required|string|max:50",
            "prenom" => "required|string|max:50",
            "etat_civile" => "required|string",
            "sexe" => "required|string",
            "tel" => "required|numeric",
            "adresse" => "required",
            "ville_id" => ['required', 'numeric', Rule::exists('villes', 'id')->where('id', $request->input('ville_id'))],
            "matiere_id.*" => ['required', 'numeric', Rule::exists('matieres', 'id')->where('id', $request->input('matiere_id'))]
        ]);

        $prof = Professeur::findOrFail($professeur);

        $prof->update([
            'matricule' => $request->input('matricule'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'etat_civile' => $request->input('etat_civile'),
            'sexe' => $request->input('sexe'),
            'tel' => $request->input('tel'),
            'adresse' => $request->input('adresse'),
            'ville_id' => $request->input('ville_id')
        ]);
        $prof->matieres()->sync($request->input('matiere_id'));

        $request->getSession()->put('success', 'modification valide');

        return redirect()->route('professeur', ['professeur' => $prof->user_id]);
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
        $request->validate([
            "matricule" => "required|string|max:30",
            "nom" => "required|string|max:50",
            "prenom" => "required|string|max:50",
            "etat_civile" => "required|string",
            "sexe" => "required|string",
            "tel" => "required|numeric",
            "adresse" => "required",
            "ville_id" => ['required', 'numeric', Rule::exists('villes', 'id')->where('id', $request->input('ville_id'))],
            "matiere_id.*" => ['required', 'numeric', Rule::exists('matieres', 'id')->where('id', $request->input('matiere_id'))]
        ]);

        $prof = Professeur::findOrFail($id);

        $prof->update([
            'matricule' => $request->input('matricule'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'etat_civile' => $request->input('etat_civile'),
            'sexe' => $request->input('sexe'),
            'tel' => $request->input('tel'),
            'adresse' => $request->input('adresse'),
            'ville_id' => $request->input('ville_id')
        ]);
        $prof->matieres()->sync($request->input('matiere_id'));

        $request->getSession()->put('success', 'modification valide');

        return redirect()->route('professeurs.index');
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

    public function renderProfesseurs()
    {
        $professeurs = Professeur::all();
        return  response()->json($professeurs, 200);
    }
}
