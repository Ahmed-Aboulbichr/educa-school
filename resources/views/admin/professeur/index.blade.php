@extends('layouts.master-educa')
@section('title') Professeurs @endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
    
@endsection

@section('content')
@component('components.breadcrumb')
    @slot('title') Professeurs @endslot
    @slot('li_1') Liste @endslot
    @slot('li_2') professeurs @endslot
@endcomponent
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
        @elseif( session()->has('notice') )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper mr-2"></i>
                {{ session()->get('notice') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif( session()->has('exists') )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper mr-2"></i>
                 {{ session()->get('exists') }}
                </div>
            @endif -
    <div class="card">
            <div class="row mb-2 mt-4">
                <div class="col-xl-2 offset-xl-10 offset-lg-9" style="padding-left: 4em;">
                    <button class="btn btn-primary waves-effect waves-light" data-target="#ajoutModal"  data-toggle="modal"><i class="mdi mdi-plus mr-1"></i>Ajouter</button>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title"></h4>
                <div class="table-responsive">
                    <table id="datatable" class="table mt-4">
                        <thead class="thead-light">
                            <tr>
                                <th>matricule</th>
                                <th>Email</th>
                                <th>Nom Prénom</th>
                                <th>Télephone</th>
                                <th>Matière</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($professeurs as $prof)    
                                <tr>
                                    <td>{{$prof->matricule}}</td>
                                    <td>{{$prof->user->email}}</td>
                                    <td>{{$prof->nom}} {{$prof->prenom}}</td>
                                    <td>{{$prof->tel}}</td>
                                    <td>
                                        <ul>
                                        @foreach ($prof->matieres as $mat)
                                            <li>{{$mat->intitule_matiere}}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <form action="{{ route('professeurs.destroy', $prof->id) }}" method="POST">
                                            <button onclick="affiche(this,{{json_encode($prof)}},{{json_encode($prof->user)}},'{{$prof->user->password}}')" class="btn btn-info p-1 btn-edit" type="button" data-toggle="modal" data-target="#editModal" data-route="{{ route('professeurs.update', $prof->id ) }}"><i class="mdi mdi-24px mdi-file-document-edit-outline"></i></button>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning p-1 btn-delete" type="submit" ><i class="mdi mdi-24px mdi-delete"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div>

        {{-- Modal pour l'ajout d'un prof  --}}
         <div id="ajoutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('professeurs.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            @if($errors->any() && session()->has('operation') && session()->get('operation') =="store")
                                @foreach($errors->all() as $error)
                                    <div class="col-6-auto">
                                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Matricule </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="matricule">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Email </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">password </label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Nom </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nom">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Prénom </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="prenom">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Etat Civile </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="etat_civile">
                                        <option></option>
                                        <option >marié (M)</option>
                                        <option >pacsé (O)</option>
                                        <option >divorcé (D)</option>
                                        <option >séparé (D)</option>
                                        <option >célibataire (C)</option>
                                        <option >veuf (V)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Sexe </label>
                                <div class="col-md-9 d-flex justify-content-around">
                                    <div class="row" style="justify-content: space-around">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="masculin" name="sexe" value="Homme" class="custom-control-input">
                                            <label class="custom-control-label" for="masculin">Masculin</label>
                                        </div>
                                    </div>
                                    <div class="row" style="justify-content: space-around">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="masculin" name="sexe" value="Homme" class="custom-control-input">
                                            <label class="custom-control-label" for="masculin">Masculin</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Télephone </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="tel">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Adresse </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="adresse">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Ville </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="ville_id">
                                        <option></option>
                                        @foreach ($villes as $ville)
                                            <option value="{{$ville->id}}">{{$ville->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Matière</label>
                                <div class="col-md-9">
                                    <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." name="matiere_id[]" >
                                        <option></option>
                                        @foreach ($matieres as $mat)
                                            <option value="{{$mat->id}}">{{$mat->intitule_matiere}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Ajouter</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>


        {{-- Modal pour la modification d'un prof  --}}
         <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="POST" id="editForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            @if($errors->any() && session()->has('operation') && session()->get('operation') =="store")
                                @foreach($errors->all() as $error)
                                    <div class="col-6-auto">
                                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Matricule </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="matricule">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Email </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">password </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="password" disabled>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Nom </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nom">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Prénom </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="prenom">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Etat Civile </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="etat_civile">
                                        <option></option>
                                        <option >marié (M)</option>
                                        <option >pacsé (O)</option>
                                        <option >divorcé (D)</option>
                                        <option >séparé (D)</option>
                                        <option >célibataire (C)</option>
                                        <option >veuf (V)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Sexe </label>
                                <div class="col-md-9 d-flex justify-content-around">
                                    <div class="row" style="justify-content: space-around">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="masculin" name="sexe" value="Homme" class="custom-control-input">
                                            <label class="custom-control-label" for="masculin">Masculin</label>
                                        </div>
                                    </div>
                                    <div class="row" style="justify-content: space-around">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="femme" name="sexe" value="Femme" class="custom-control-input">
                                            <label class="custom-control-label" for="femme">Femme</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Télephone </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="tel">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Adresse </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="adresse">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Ville </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="ville_id">
                                        <option></option>
                                        @foreach ($villes as $ville)
                                            <option value="{{$ville->id}}">{{$ville->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Matière</label>
                                <div class="col-md-9">
                                    <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." name="matiere_id[]" id="matiere" >
                                        <option></option>
                                        @foreach ($matieres as $mat)
                                            <option value="{{$mat->id}}">{{$mat->intitule_matiere}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Modifier</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

</div> 
@endsection
@section('script')

    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js')}}"></script>

    @if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="store")
    <script>$('#ajoutModal').modal('toggle');</script>
    @endif
    @if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="update")
    <script>$('#editModal').modal('toggle');</script>
    @endif

    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <script src="{{ URL::asset('/assets/js/pages/sweet-alerts.init.js')}}"></script>
    <script>
        $('.btn-delete').on('click', function(event){
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parents('form').submit();
                }
            });
        });

        function affiche(courant,data,second,third){
            $("#editForm").attr('action', courant.getAttribute('data-route'));
            $('input[name=matricule]').val(data.matricule);
            $('input[name=email]').val(second.email);
            $('input[name=password]').val(third);
            $('input[name=nom]').val(data.nom);
            $('input[name=prenom]').val(data.prenom);
            $('input[name=tel]').val(data.tel);
            $('input[name=adresse]').val(data.adresse);
            $('select[name=etat_civile] > option').each(function(index,element){
                if($(element).text() === data.etat_civile){
                    $(element).attr('selected','selected');
                }
            });
            $('select[name=ville_id] > option').each(function(index,element){
                if($(element).val() == data.ville_id){
                    $(element).attr('selected','selected');
                }
            });
            mat = [];
            for(i=0; i< data.matieres.length;i++){
                mat.push(data.matieres[i].id);
            }
             $('#matiere').val(mat);
             $('#matiere').select2(mat);
            $('input[name=sexe]').each(function(index,element){
                if($(element).val() === data.sexe){
                    $(element).attr('checked','checked');
                }
            });
        }
    </script>
@endsection
