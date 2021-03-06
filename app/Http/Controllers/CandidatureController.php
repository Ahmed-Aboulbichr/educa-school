<?php

namespace App\Http\Controllers;

use App\Candidat;
use App\Formation;
use App\Candidature;
use App\Cursus_universitaire;
use App\Niveau_etude;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CandidatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        //   abort_if(Gate::denies('Candidature_access'), 403);
        $candidatures = DB::table('candidatures')
            ->join('candidats', 'candidat_id', '=', 'candidats.id')
            ->join('formations', 'formation_id', '=', 'formations.id')
            ->select('candidatures.*', 'candidats.prenom_fr', 'candidats.nom_fr', 'formations.specialite')
            ->get();

        return view('admin.candidature.liste', compact('candidatures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $formation = Formation::where('id', $id)->latest()->first();
        return view('pre-inscription.candidature')->with('formation', $formation);
    }

    public function conditionAcces($niveauPreRequise, $niveauEtude)
    {
        //$val = strcmp($niveauPreRequise,$niveauEtude);
        if ($niveauEtude >= $niveauPreRequise) {
            return true;
        }
        if ($niveauEtude < $niveauPreRequise) {
            return false;
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // abort_if(Gate::denies('Candidature_create'), 403);
        $candidat = Candidat::where('user_id', Auth::id())->orWhere('editor_id',Auth::id())->first();
        $formation = Formation::where('id', $request->get('id'))->first();

        if (is_object($candidat) && is_object($formation)) {

            //r??cup??rer le niveau pre requise
            $niveauPreRequise = Niveau_etude::where('id', $formation->niveau_preRequise)->first()->intitule;
            //r??cup??rer le derni??re cursus de candidat
            $maxniv = Niveau_etude::where('intitule', Niveau_etude::whereIn('id', Cursus_universitaire::where('candidat_id', $candidat->id)->get('niveau_etude_id'))->max('intitule'))->first();
            $cursusUniv = Cursus_universitaire::where('candidat_id', $candidat->id)->where('niveau_etude_id', $maxniv->id)->first();

            $check = false;

            if ($cursusUniv === null) {
                $niveauEtude = "BAC";
                $check = $this->conditionAcces(strval($niveauPreRequise), $niveauEtude);
            }
            if ($cursusUniv !== null) {
                //r??cup??re le niveau etude de cette cursus
                $niveauEtudeUniv = Niveau_etude::where('id', $cursusUniv->niveau_etude_id)->first()->intitule;
                $check = $this->conditionAcces($niveauPreRequise, strval($niveauEtudeUniv));
            }

            if ($check === true) {
                $candidature = Candidature::create([
                    'labelle' => $candidat->nom_fr . ' ' . $candidat->prenom_fr,
                    'candidat_id' => $candidat->id,
                    'formation_id' => $formation->id,
                ]);

                $cursusUniversitaires = Cursus_universitaire::where('candidat_id', $candidat->id)->get();

                foreach ($cursusUniversitaires as $cursusUniv) {
                    //r??cup??re le niveau etude de chaque cursus
                    $niveauIterative = Niveau_etude::where('id', $cursusUniv->niveau_etude_id)->first()->intitule;
                    if ($niveauIterative <= $niveauPreRequise) {
                        $candidature->Cursus_universitaires()->attach($cursusUniv);
                    }
                }
                return redirect('/getFormations')->with('success', 'Votre candidature a ??t?? enregistr??e');
            }

            if ($check === false)
                return redirect('/getFormations')->with('notice', 'Vous avez pas completez vos informations scolaires pour postuler ?? cette formation');
        }
    }


    function renderMyCandidatures()
    {

        //   abort_if(Gate::denies('Candidature_load'), 403);
        $candidat  = Candidat::where('user_id', Auth::id())->orWhere('editor_id',Auth::id())->latest()->first();
        if ($candidat == null) return redirect(route('getPreInscr'), 302);
        else
            $candidatures = DB::table('formations')
                ->join('sessions', 'session_id', '=', 'sessions.id')
                ->join('type_formations', 'type_formation_id', '=', 'type_formations.id')
                ->join('candidatures', 'formations.id', '=', 'candidatures.formation_id')
                ->select(['formations.*', 'candidatures.id', 'candidatures.candidat_id', 'candidatures.valide',  'sessions.annee_univ', 'type_formations.designation'])
                ->whereIn('candidatures.candidat_id', function ($query) {
                    $query->select('id')->from('candidats')->where('user_id', Auth::id())->orWhere('editor_id',Auth::id());
                })
                ->orderBy('sessions.annee_univ', 'desc')
                ->get();

        return view('candidat.candidatures.mesCandidatures', compact('candidatures'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    function downloadPDF($id)
    {
        abort_if(Gate::denies('Candidature_PDF_download'), 403);

        $candidature = Candidature::where('id', $id)->first();
        abort_if(($candidature == null), 404);
        $candidat = Candidat::where('id', $candidature->candidat_id)->first();

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->setPaper('A4', 'portait');
        set_time_limit(300);



        $profileImg = base64_encode(Storage::get($candidat->docFiles()->where('type', '=', 'profileImg')->first()->path));
        return $pdf->loadView('pre-inscription.attestationPDF', compact('candidat', 'profileImg', 'candidature'))->stream();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    function showPDF($id)
    {

        abort_if(Gate::denies('Candidature_PDF_view'), 403);
        $candidature = Candidature::where('id', $id)->first();
        abort_if(($candidature == null), 404);
        $candidat = Candidat::where('id', $candidature->candidat_id)->first();

        $profileImg = base64_encode(Storage::get($candidat->docFiles()->where('type', '=', 'profileImg')->first()->path));
        return view('pre-inscription.attestation')->with('candidat', $candidat)->with('profileImg', $profileImg)->with('candidature', $candidature);
    }

    function show(Request $req, $formation)
    {
        $candidatures = DB::table('candidatures')
            ->join('candidats', 'candidats.id', '=', 'candidat_id')
            ->join('formations', 'formations.id', '=', 'formation_id')
            ->where('formation_id', '=', $formation)
            ->select('candidatures.id', 'candidatures.labelle', 'candidatures.valide', 'formations.specialite', 'candidats.nom_fr', 'candidats.prenom_fr')
            ->get();

        return view('admin.candidature.liste', compact('candidatures'));
    }

    function editValidation(Candidature $candidature, $id)
    {

        $candidature = Candidature::findOrFail($id);

        ($candidature->valide == 1) ? ($candidature->valide = 0) : ($candidature->valide = 1);

        $candidature->save();

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    function edit($id)
    {

        abort_if(Gate::denies('Candidature_edit'), 403);

        $candidat = Candidat::where('id', Candidature::where('id', $id)->first()->candidat_id)->first();
        if($candidat!=null && $candidat->user_id!=Auth::id() && User::where('id',Auth::id())->first()->hasRole('Super Admin') ){
            Candidat::where('editor_id',Auth::id())->update(['editor_id'=>null]);
            Candidat::where('id', Candidature::where('id', $id)->first()->candidat_id)->update(['editor_id'=>Auth::id()]);

       }
        return view('pre-inscription.inscription-page')->with('candidat', $candidat);
    }




    function valide($id)
    {
        //to do : traitement d'envoy??er l'email
        return redirect()->route('candidatures.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    function update(Request $request, Candidature $candidature)
    {
        abort_if(Gate::denies('Candidature_update'), 403);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidature  $candidature
     * @return \Illuminate\Http\Response
     */
    function destroy($id)
    {
        abort_if(Gate::denies('Candidature_delete'), 403);
        $candidature = Candidature::findOrFail($id);

        $candidature->delete();
        $candidature->Cursus_universitaires()->detach();
        return redirect()->route('mesCandidatures')->with('success', 'Votre candidature a ??t?? annul??e');;
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
