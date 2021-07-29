<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Candidat;
use App\Cursus_universitaire;
use App\docFile;
use App\Niveau_etude;
use App\Universite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CursusUniversitaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $candidat = Candidat::where('user_id', Auth::user()->id)->orWhere('editor_id',Auth::id())->get('id')->first();
        if ($candidat == null) {
            return redirect()->route('getPreInscr');
        }
        $cursus = Cursus_universitaire::where('candidat_id', $candidat->id)
            ->join('niveau_etudes', 'niveau_etude_id', '=', 'niveau_etudes.id')
            ->join('candidats', 'candidats.id', '=', 'candidat_id')
            ->select('niveau_etudes.intitule', 'cursus_universitaires.*')
            ->get();

        $universities = Universite::all();

        $niveaux = Niveau_etude::all();

        $data = [
            'cursus' => $cursus,
            'universities' => $universities,
            'niveaux' => $niveaux
        ];

        return view('candidat.parcours.parcours', compact('data', $data));

        /* $cursus = DB::table('cursus_universitaires') */
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::beginTransaction();

        $candidat = Candidat::where('user_id', Auth::user()->id)->orWhere('editor_id',Auth::id())->first()->id;

        $request->validate([
            'niveau_etude_id' => [ 'required', 'integer', 'max:255',Rule::exists('niveau_etudes', 'id')->where('id', $request->input('niveau_etude_id'))],
            'Annee_univ' => 'required',
            'universite_id' =>  [ 'required', 'integer', 'max:255',Rule::exists('universites', 'id')->where('id', $request->input('universite_id'))],
            'specialite' => 'required|max:255',
            'note_S1' =>  [ 'required', 'numeric', 'between:0,20'],
            'note_S2' => [ 'required', 'numeric', 'between:0,20'],
            'files' =>  ['required','image'],
        ]);


        if ($this->isExists($request->input('niveau_etude_id'), $candidat)) {
            $request->session()->flash('exists', 'Ce Diplôme exists déja, Si vous voulez le modifier cliquer sur le bouton edit ');
            return redirect()->route('cursus_universitaire.index');
        }
        $cursus = new Cursus_universitaire([
            'specialite' => $request->input('specialite'),
            'universite_id' => $request->input('universite_id'),
            'note_S1' => $request->input('note_S1'),
            'note_S2' => $request->input('note_S2'),
            'Annee_univ' => $request->input('Annee_univ'),
            'niveau_etude_id' => DB::table('niveau_etudes')->where('intitule', '=', $request->input('niveau_etude_id'))->get('id')->first()->id,
            'candidat_id' => $candidat
        ]);
        $cursus->save();


        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $key => $file) {
                $filename = (($key == 0) ? 'Releve_Note_S1' : (($key == 1) ? 'Releve_Note_S2' : 'Attestation_de_Reussite'));
                /* $filesize = $file->getClientSize(); */

                $filepath = $this->handleUploadedImage($file);
                $doc_files = new docFile([
                    'type' => $filename,
                    'path' => $filepath,
                    'candidat_id' => $candidat,
                    'cursus_universitaire_id' => $cursus->id
                ]);

                $doc_files->save();
            }
        }

        DB::commit();

        $request->session()->flash('success', 'Diplôme est ajoutée avec succes');

        return redirect()->route('cursus_universitaire.index');
    }

    public function isExists($niveauEtude, $candidat)
    {
        $isExistsCursus = DB::table('cursus_universitaires')
            ->where('niveau_etude_id', '=', $niveauEtude)
            ->where('candidat_id', '=', $candidat)
            ->first();
        if (is_null($isExistsCursus)) {
            return false;
        }
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cursus_universitaire  $cursus_universitaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cursus_universitaire $cursus_universitaire)
    {
        $doc_files = DB::table('doc_files')
            ->where('candidat_id', '=', $cursus_universitaire->candidat_id)
            ->where('cursus_universitaire_id', '=', $cursus_universitaire->id)
            ->get();

        foreach ($doc_files as $doc) {
            try {

                unlink(base_path() . '/storage/app/' .  $doc->path);
            } catch (\Throwable $th) {
                //throw $th;
            }
            docFile::where('id', $doc->id)->delete();
        }
        $candidatures =  $cursus_universitaire->candidatures;
        $cursus_universitaire->candidatures()->detach();
        foreach ($candidatures as $candidature) {
            $candidature->delete();
        }
        $cursus_universitaire->delete();

        return redirect()->route('cursus_universitaire.index')
            ->with('success', 'cursus deleted successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Cursus_universitaire  $cur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursus = Cursus_universitaire::findOrFail($id);

        $universities = Universite::all();

        $universite = Universite::findOrFail($cursus->universite_id);

        $doc_files = DB::table('doc_files')
            ->where('candidat_id', '=', $cursus->candidat_id)
            ->where('cursus_universitaire_id', '=', $cursus->id)
            ->get();

        return view('candidat.parcours.modify')->with('cursus', $cursus)->with('docs', $doc_files)->with('univer', $universite)->with('universities', $universities);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cursus_universitaire  $cursus_universitaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Cursus_universitaire $cursus_universitaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cursus_universitaire  $cursus_universitaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cursus_universitaire $cursus_universitaire)
    {

        DB::beginTransaction();

        $request->validate([
            'Annee_univ' => 'required',
            'universite_id' =>  [ 'required', 'integer', 'max:255',Rule::exists('universites', 'id')->where('id', $request->input('universite_id'))],
            'specialite' => 'required|max:255',
            'note_S1' =>  [ 'required', 'numeric', 'between:0,20'],
            'note_S2' => [ 'required', 'numeric', 'between:0,20'],
            'files' => ['image'],
        ]);
        Cursus_universitaire::where('id', $cursus_universitaire->id)
            ->update([
                'Annee_univ' => $request->input('Annee_univ'),
                'universite_id' => $request->input('universite_id'),
                'specialite' => $request->input('specialite'),
                'note_S1' => $request->input('note_S1'),
                'note_S2' => $request->input('note_S2')
            ]);

        $docs = DB::table('doc_files')
            ->where('candidat_id', '=', $cursus_universitaire->candidat_id)
            ->where('cursus_universitaire_id', '=', $cursus_universitaire->id)
            ->get();


        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $key => $file) {
                $filename = (($key == 0) ? 'Releve_Note_S1' : (($key == 1) ? 'Releve_Note_S2' : 'Attestation_de_Reussite'));
                /* $filesize = $file->getClientSize(); */

                $filepath = $this->handleUploadedImage($file);
                try {

                    unlink(base_path() . '/storage/app/' .  $docs[$key]->path);
                } catch (\Throwable $th) {
                    //throw $th;
                }

                DB::table('doc_files')->where('id', $docs[$key]->id)->update([
                    'type' => $filename,
                    'path' => $filepath,
                    'candidat_id' => $cursus_universitaire->candidat_id,
                    'cursus_universitaire_id' => $cursus_universitaire->id
                ]);
            }
        }
        DB::commit();
        return redirect()->route('cursus_universitaire.index');
    }



    public function handleUploadedImage($file)
    {


        if (!is_null($file)) {
            $path =  Storage::putFile('uploads', $file);
            return $path;
        }
    }
}
