@extends('layouts.master-layouts-candidat')

@section('title')
    Mon Parcours
@endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

    
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
    <!--<style>
        .card {
          /* Add shadows to create the "card" effect */
          box-shadow: 5px 6px 15px 5px rgba(0.2,0.2,0.2,0.2);
          transition: 0.3s;
        }

        /* On mouse-over, add a deeper shadow */
        .card:hover {
          box-shadow: 10px 18px 28px 10px rgba(0.2,0.2,0.2,0.2);
        }

        /* Add some padding inside the card container */
        .container {
          padding: 2px 16px;
        }
    </style> !-->
@endsection
@section('body')
<body data-topbar="dark" data-layout="horizontal">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            @if( session()->has('success') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all mr-2"></i>
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @elseif( session()->has('exists') )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper mr-2"></i>
                 {{ session()->get('exists') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Veuillez ajouter vos cursus universitaire (anneé par anneé) à partir du bouton "Ajouter"</h4>
                    <div class="bg-light d-flex float-right mb-4">
                        <button class="btn btn-primary waves-effect waves-light"  data-toggle="modal" data-target=".bs-example-modal-center" id="ajout"><i class="mdi mdi-plus mr-1"></i>Ajouter</button>
                    </div>

                    <div class="table-responsive">
                        <table id="datatable" class="table mt-4">
                            <thead class="thead-light">
                                <tr>
                                    <th>Niveau Etude</th>
                                    <th>Spécialité</th>
                                    <th>Note S1</th>
                                    <th>Note S2</th>
                                    <th>Année</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['cursus'] as $cur)
                                <tr class="tr">
                                    <td>{{$cur->intitule}}</td>
                                    <td>{{$cur->specialite}}</td>
                                    <td>{{ $cur->note_S1 }}</td>
                                    <td>{{ $cur->note_S2 }}</td>
                                    <td>{{ $cur->Annee_univ }}</td>
                                    <td>
                                        {{-- <button class="btn btn-warning p-1" id="submitForm"><i class="mdi mdi-24px mdi-delete"></i></button> --}}
                                        <form action="{{ route('cursus_universitaire.destroy', $cur->id) }}" method="POST">
                                            <a class="btn btn-info p-1" type="button" href="{{ route('cursus_universitaire.show', $cur->id) }}" ><i class="mdi mdi-24px mdi-file-document-edit-outline"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning p-1" name="archive" type="submit" onclick="alertFunction(event,this)" ><i class="mdi mdi-24px mdi-delete"></i>   </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  Modal  --}}
    <div class="modal fade bs-example-modal-center bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Ajout d'une année universitaire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('cursus_universitaire.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="col-6-auto">
                                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                </div>
                            @endforeach
                        @endif
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Niveau Etude</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="niveau_etude_id" id="nvEtude">
                                        <option value="">Sélectionner un niveau </option>
                                        <option value="{{ $data['niveaux']->id }}">{{ $data['niveaux']->intitule }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="annee" class="col-md-3 col-form-label">Année universitaire</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="annee" name="Annee_univ">
                                        <option value="{{date('Y')}}-{{date('Y')+1}}">{{date('Y')}}-{{date('Y')+1}}</option>
                                        @for ($i = 0; $i <20; $i++)
                                            @php
                                                $currentYear = date('Y');
                                                $year = $currentYear - $i;
                                                $lastYear = $currentYear-($i+1);
                                            @endphp
                                            <option  value="{{$lastYear}}-{{$year}}">{{$lastYear}}-{{$year}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="example-text-input" class="col-md-3 col-form-label">Nom université</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="universite_id">
                                        <option value="-1"></option>
                                        @foreach ($data['universities'] as $universite)
                                            <option value="{{ $universite->id }}">{{ $universite->intitule }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="specialite" class="col-md-3 col-form-label">Spécialité</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="specialite"  id="specialite">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="noteS1" class="col-md-3 col-form-label">Note S1</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" name="note_S1"  id="noteS1" step="0.01">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="noteS2" class="col-md-3 col-form-label">Note S2</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" name="note_S2" id="noteS2" step="0.01">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="fileS1" class="col-md-3 col-form-label">Relevé de notes S1</label>
                                <div class="col-md-9">
                                    <input type="hidden" name="type" value="Releve_Note_S1">
                                    <input type="file" class="custom-file-input" name="files[]" id="fileS1" accept="image/*"  onchange="getName(event,this)">
                                    <label class="custom-file-label" for="fileS2">Choose file</label>
                                    <span class="text-muted" >only images</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="fileS2" class="col-md-3 col-form-label">Relevé de notes S2</label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="hidden" name="type"  value='Releve_Note_S2'>
                                        <input type="file" class="custom-file-input" name="files[]" id="fileS2" accept="image/*" onchange="getName(event,this)">
                                        <label class="custom-file-label" for="fileS2">Choose file</label>
                                    </div>
                                    {{-- <input class="form-control" type="file" name="files[]" id="fileS2" accept="image/*"  onchange="getName(event, 1)"> --}}
                                    <span class="text-muted" >only images</span>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Ajouter</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')

    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>


    @if (count($errors) > 0)
        <script>$('#ajout').click();</script>
    @endif

    <script src="{{ URL::asset('/assets/js/dilpome.js') }}" ></script>

    <script>
        function getName(e, elementCourant){
            var name=e.target.files[0].name;
            $(elementCourant).siblings('label').html($(elementCourant).siblings('input').val());
        }
    </script>
@endsection
