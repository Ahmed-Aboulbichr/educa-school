@extends('layouts.master-educa')
@section('title') E-Document @endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col">
        <h3>
            <a href="{{ url()->previous() }}"><button class="btn btn-outline-primary"><i
                        class=" ri-arrow-go-back-fill"></i> Retour</button></a>
        </h3>
    </div>
    @php
    $traiter = 'att';

    @endphp

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <div class="accordion" id="data">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#Demande"
                                        aria-expanded="true" aria-controls="Demande">
                                        Demande information
                                    </button>
                                </h5>
                            </div>

                            <div id="Demande" class="collapse show" aria-labelledby="headingOne" data-parent="#data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <label style="font-weight:bold;">Date de demande : </label>
                                        </div>
                                        <div class="col-md-8 col-6">12/45/2005</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label style="font-weight:bold;">Document : </label>
                                        </div>
                                        <div class="col-md-8 col-6">attestation</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label style="font-weight:bold;">Donner supplémentaire : </label>
                                        </div>
                                        <div class="col-md-8 col-6">none</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#Demandeur" aria-expanded="false" aria-controls="Demandeur">
                                        Demandeur information
                                    </button>
                                </h5>
                            </div>
                            <div id="Demandeur" class="collapse" aria-labelledby="headingTwo" data-parent="#data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <label style="font-weight:bold;">Nom de demandeur : </label>
                                        </div>
                                        <div class="col-md-8 col-6">Hasan el hossayni</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label style="font-weight:bold;">CNE : </label>
                                        </div>
                                        <div class="col-md-8 col-6">CD123456</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label style="font-weight:bold;">CIN : </label>
                                        </div>
                                        <div class="col-md-8 col-6">N12334567</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#action" aria-expanded="false" aria-controls="action">
                                        @if ($traiter == 'att')
                                            Take action
                                        @else
                                            Action taken
                                        @endif
                                    </button>
                                </h5>
                            </div>
                            <div id="action" class="collapse" aria-labelledby="headingTree" data-parent="#data">
                                <div class="card-body">

                                    @if ($traiter == 'att')
                                        <div class="row">
                                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                            <div class="col">
                                                <button class="btn btn-primary" data-toggle="modal"
                                                    data-target="#traiterModal">Traiter le demande</button>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#rejModal">Reject le demande</button>
                                            </div>
                                        </div>
                                    @elseif ($traiter=='com')
                                        <div class="row">
                                            <div class="col">
                                                <label style="font-weight:bold;">Traiter par : </label>
                                            </div>
                                            <div class="col-md-8 col-6">chef moha</div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label style="font-weight:bold;">Au date : </label>
                                            </div>
                                            <div class="col-md-8 col-6">12/54/1998</div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label style="font-weight:bold;">Le document traiter : </label>
                                            </div>
                                            <div class="col-md-8 col-6"> <button type="button" class="btn btn-success btn-sm"><i
                                                        class="mdi mdi-download"></i>
                                                    Télécharger le document </button></div>
                                        </div>
                                    @elseif ($traiter=='rej')
                                        <div class="row">
                                            <div class="col">
                                                <label style="font-weight:bold;">Refuser par : </label>
                                            </div>
                                            <div class="col-md-8 col-6">chef moha</div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label style="font-weight:bold;">Au date : </label>
                                            </div>
                                            <div class="col-md-8 col-6">12/54/1998</div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label style="font-weight:bold;">le motif de rejet : </label>
                                            </div>
                                            <div class="col-md-8 col-6"> BLA BLA BLA BLA BLA BLA BLA BLA</div>
                                        </div>
                                    @endif


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="traiterModal">
        <div class="modal-dialog ">
            <form name="theForm" action="" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Traiter le demanede : </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        Upload le(s) document(s) :
                        <form action="">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit"
                                        id="inputGroupFileAddon04">Envoyer</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div class="row">
                            <div class="col">
                                <hr>
                            </div>
                            <div class="col-auto">OU</div>
                            <div class="col">
                                <hr>
                            </div>
                        </div>
                        <br>
                        Envoi un reçu au client qu'il doit présonter au administration pour recevoir le document traiter

                        <center> <button class="btn btn-primary">send alert</button></center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
        </div>
    </div>
    <div class="modal fade" id="rejModal">
        <div class="modal-dialog ">
            <form name="theForm" action="" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Refuse le Demande : </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <dl>
                            <dt>Donner le motife du rejet de demande : </dt>
                            <dd>
                                <textarea name="motif" class="form-control" rows="5" required></textarea>
                            </dd>
                        </dl>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" onclick="fnc" class="btn btn-danger">rejet</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
