
@extends('layouts.master-without-side-bar-candidat')

@section('title')
    Candidature
@endsection
@section('css')
    <style>
        img{
            max-width: 100%;
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
<div>
    <div class="col-lg-9" style="min-width: 100%">
        <div class="card">
            <div class="card-body">
                <div>
                    <div class="row no-gutters">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('cursus_universitaire.update', $cursus->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="modal-body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="col-6-auto">
                                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                </div>
                            @endforeach
                        @endif

                        @if( session()->has('success') )
                            <div class="alert alert-success" role="alert" >{{ session()->get('success') }}</div>
                        @elseif( session()->has('exists') )
                            <div class="alert alert-warning" role="alert" >{{ session()->get('exists') }}</div>
                        @endif
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Niveau Etude</label>
                                <div class="col-md-9">
                        
                                       
                                        <input type="text"class="form-control" disabled value="{{ $cursus->niveau_etude->intitule}}" >
                                       
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="annee" class="col-md-3 col-form-label">Anne universitaire</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="annee" name="Annee_univ" value="{{$cursus->Annee_univ}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="example-text-input" class="col-md-3 col-form-label">Nom université</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="universite_id">
                                        <option value="-1"></option>
                                        @foreach ($universities as $universite)
                                            <option {{$universite->id==$univer->id? 'selected' : ''}} value="{{ $universite->id }}">{{ $universite->intitule }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="specialite" class="col-md-3 col-form-label">Spécialité</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="specialite"  id="specialite" value="{{ $cursus->specialite }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="noteS1" class="col-md-3 col-form-label">Note S1</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" name="note_S1"  id="noteS1" step="0.01" value="{{ $cursus->note_S1 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row ">
                                <label for="noteS2" class="col-md-3 col-form-label">Note S2</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" name="note_S2" id="noteS2" step="0.01" value="{{ $cursus->note_S2 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="fileS1" class="col-md-3 col-form-label">Relevé de notes S1</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="file" name="files[]" id="fileS1" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group" >
                                <img src="{{ asset("storage/". $docs[0]->path) }}" onclick="location.href=this.src">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="fileS1" class="col-md-3 col-form-label">Relevé de notes S2</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="file" name="files[]" id="fileS1" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group">
                                <img src="{{ asset("storage/". $docs[1]->path)  }}" onclick="location.href=this.src">
                            </div>
                        </div>

                        {{$docs->get('id') }}
                        @if($docs->where('type','Attestation_de_Reussite')->first())
                            <div class="col-lg-6">
                                <div class="form-group row align-items-center">
                                    <label for="attest" class="col-md-3 col-form-label">Attestation de réussite</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="file" name="files[]" id="attest" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <img src="{{ asset("storage/". $docs->where('type','Attestation_de_Reussite')->first()->path)  }}" onclick="location.href=this.src">
                                </div>
                            </div>
                        @endif
                    </div> <!-- end row -->
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="candidat" value="{{$cursus->candidat_id}}">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Modifier</button>
                    <a type="submit" class="btn btn-success waves-effect waves-light" href="{{ route('cursus_universitaire.index') }}">Tout est bon!</a>
                </div>
                </form>
        </div>
    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('script')
    <script src="{{ URL::asset('/assets/js/dilpome.js') }}" ></script>

    <script>
        function getName(e, elementCourant){
            alert($(elementCourant).attr('value'));
            var name=e.target.files[0].name;
            $(elementCourant).siblings('label').html($(elementCourant).attr('value'));
        }
    </script>

@endsection
