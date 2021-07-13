
@extends('layouts.master-without-side-bar-candidat')

@section('title')
    Candidature
@endsection
@section('css')
    <!-- twitter-bootstrap-wizard css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <link href="{{ URL::asset('/assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.css')}}" rel="stylesheet" type="text/css" />

    <!--Arabic Keyboard -->
    <link rel="stylesheet" type="text/css" href="http://www.arabic-keyboard.org/keyboard/keyboard.css">
    <!-- Plugins css -->
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/css/arabic.css')}}" rel="stylesheet" type="text/css" />
    
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
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
            </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title"><span class="badge badge-pill badge-info" >---</span> Mon Parcours</h4>
                <p class="card-title-desc">Veuillez Ajouter vos diplôme à partir du bouton "ajouter diplôme".</p>
                <div class="bg-light d-flex float-right mb-4">
                    <button class="btn btn-primary waves-effect waves-light"  data-toggle="modal" data-target=".bs-example-modal-center">ajouter diplôme</button>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Niveau Etude</th>
                        <th>Specialite</th>
                        <th>Note S1</th>
                        <th>Note S2</th>
                        <th>Année</th>
                        <th>Document</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach ($cursus as $cur)
                    <tr>
                        <td>{{$cur->intitule}}</td>
                        <td>{{$cur->specialite}}</td>
                        <td>{{ $cur->note_S1 }}</td>
                        <td>{{ $cur->note_S2 }}</td>
                        <td>{{ $cur->Annee_univ }}</td>
                        <td>icon for doc</td>
                        <td>
                            {{-- <button class="btn btn-warning p-1" id="submitForm"><i class="mdi mdi-24px mdi-delete"></i></button> --}}
                            <form action="{{ route('cursus_universitaire.index') }}" method="POST">
                                <button class="btn btn-info p-1" ><i class="mdi mdi-24px mdi-file-document-edit-outline"></i></button>
                                <button class="btn btn-warning p-1" name="archive" type="submit" id="submitForm" ><i class="mdi mdi-24px mdi-delete"></i>   </button>
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

    {{--  Modal  --}}
    <div class="modal fade bs-example-modal-center bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Center modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Niveau Etude</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="nvEtude" id="nvEtude">
                                        <option value="">BAC + 1</option>
                                        <option value="">BAC + 2</option>
                                        <option value="">BAC + 3</option>
                                        <option value="">BAC + 4</option>
                                        <option value="">BAC + 5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Select</label>
                                <div class="col-md-10">
                                    <select class="form-control">
                                        <option>Select</option>
                                        <option>Large select</option>
                                        <option>Small select</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="example-text-input" class="col-md-3 col-form-label">Anne universitaire</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="example-text-input" class="col-md-3 col-form-label">Nom université</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="example-text-input" class="col-md-3 col-form-label">Spécialité</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="example-text-input" class="col-md-3 col-form-label">Note S1</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row align-items-center">
                                <label for="example-text-input" class="col-md-3 col-form-label">Note S2</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Document</h4>
                                    <div>
                                        <form action="#" class="dropzone">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple="multiple">
                                            </div>
                                            <div class="dz-message needsclick">
                                                <div class="mb-3">
                                                    <i class="display-4 text-muted ri-upload-cloud-2-line"></i>
                                                </div>
                                                
                                                <h4>Drop files here or click to upload.</h4>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="text-center mt-4">
                                        <button type="button" class="btn btn-primary waves-effect waves-light">Send Files</button>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection



@section('script')


    <!-- twitter-bootstrap-wizard js -->
    <script src="{{ URL::asset('/assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
     <!-- Plugins js -->
     <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js')}}"></script>
    <!-- form wizard init -->
    <script src="{{ URL::asset('/assets/js/pages/form-wizard.init.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/candidature.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/formation.js')}}"></script>
    
    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ URL::asset('/assets/js/pages/sweet-alerts.init.js') }}"></script>
    {{-- Arabic keyboard --}}
    <script type="text/javascript" src="http://www.arabic-keyboard.org/keyboard/keyboard.js" charset="UTF-8"></script>

    <script>



          Dropzone.autoDiscover = false;
        var config = {
            routes: {

                getFormations: "{{route('getFormations')}}",
                saveCandidature:"{{route('saveCandidature')}}",
                showPDF:"",
            }
        };

      $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
      });

      $('#submitForm').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
            title: 'êtes vous sûr de supprimer ce diplôme?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                form.submit();
            }  
        });
    });

   </script>
@endsection
