@extends('layouts.master')
@section('title') Calendar @endsection
@section('css')
<style>
    .fc-content{
        display: inline-flex !important;
    }
</style>
    <!-- Plugin css -->
    <link href="{{ URL::asset('/assets/libs/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')                
    @slot('title') Calendar @endslot
    @slot('li_1') Nazox @endslot
    @slot('li_2') Calendar @endslot
@endcomponent 

    <form id="getEvents" >
        <div class="row">
    <div class="col-3">
        <select class="form-control select2" required name ="session" id="session" onchange="afficheFormations()">
            <option value="null">Séléctionner la session</option>
                @foreach($sessions as $session)
                    <option value="{{$session->id}}">{{$session->annee_univ}}</option>
                @endforeach
        </select>
    </div>
    <div class="col-3">
        <select class="form-control select2" required name ="formation" id="formation" onchange="afficheSemestres()">
            <option value="null">Séléctionner la formation</option>
    
        </select>
    </div>
    <div class="col-3">
        <select class="form-control select2" required name ="semestre" id="semestre" onchange="afficheGroupes()">
            <option value="null">Séléctionner le semestre</option>
        </select>
    </div>
    <div class="col-3">
        <select class="form-control select2" required name ="groupe" id="groupe" onchange="afficheSousGroupes();">
            <option value="null">Séléctionner le groupe</option>
        </select>
    </div>
    <div class="col-3">
        <select class="form-control select2" name ="sousGroupe" id="sousGroupe" >
            <option value="null">Séléctionner le sous groupe</option>
        </select>
    </div>
    <button type="submit"  class="btn btn-primary waves-effect waves-light"><i class="ri-refresh-line"> Afficher l'emploi </i></button>
       
</div>                
</form>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row mb-2 mt-4">
                    <div class="col-xl-2 offset-xl-10 offset-lg-9" style="padding-left: 4em;">
                        <button class="btn btn-primary waves-effect waves-light" id="ajoutButton"  data-toggle="modal"><i class="mdi mdi-plus mr-1"></i>Ajouter</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id='calendar-1'></div>

                    <div style='clear:both'></div>
                </div>
            </div>
        </div>
    </div>
       <!--Modal Ajout -->
       <div id="ajoutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Ajout d'une seance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addEvent" >
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
                            <label class="col-md-3 col-form-label">Jours</label>
                            <div class="col-md-9">
                                <select class="form-control" required name="jour" id="jour">
                                    <option>--- Jours ---</option>
                                        <option value="Lundi">Lundi</option>
                                        <option value="Mardi">Mardi</option>
                                        <option value="Mercredi">Mercredi</option>
                                        <option value="Jeudi">Jeudi</option>
                                        <option value="Vendredi">Vendredi</option>
                                        <option value="Samedi">Samedi</option>
                                        <option value="Dimanche">Dimanche</option>
                                
                                </select>
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-md-3 col-form-label">Heure début de Séance</label>
                            <div class="col-md-9">
                                <input class="form-control" type="time" name="heureSeance" id="heureSeance">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-md-3 col-form-label">Durée de Séance</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="dureeSeance" min="0" id="dureeSeance">
                            </div>
                        </div>
                        <span   onclick="afficheSalles(); afficheMatieres();" class="btn btn-primary waves-effect waves-light"><i class="ri-refresh-line"> Recharger les Salles/Matières disponibles </i></span>
                        <div class="form-group row align-items-center">
                            <label class="col-md-3 col-form-label">Salles</label>
                            <div class="col-md-9">
                                <select class="form-control" required name="salle" id="salle">
                                    <option>---  Salle  ---</option>
                                   
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row align-items-center">
                            <label class="col-md-3 col-form-label">Matières</label>
                            <div class="col-md-9">
                                <select class="form-control" required name="matiere" id="matiere">
                                    <option>--- Matières ---</option>
                                
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Fermer</button>
                        <span id="addSeance" class="btn btn-primary waves-effect waves-light">Ajouter</span>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

@endsection
@section('script')
    <!-- plugin js -->
    <script src="{{ URL::asset('/assets/libs/moment/moment.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
    <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
    
    <!-- Calendar init -->
    <script src="{{ URL::asset('/assets/js/pages/emploi_calendar.init.js')}}"></script>

    <script>
      
$(document).ready(function () {

$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});

var calendar = $('#calendar-1').fullCalendar({
    editable:true,
    header:{
        left:'prev,next today',
        center:'title',
        right:'agendaWeek,agendaDay'
    },
    height:'100%',
    firstDay:1,
    events:'/calendar',
    selectable:true,
    selectHelper: true,
    axisFormat: 'HH:mm',
    timeFormat: 'HH:mm' ,
    select:function(start, end, allDay)
    {
        var title = prompt('Event Title:');

        if(title)
        {
            var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

            var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

            $.ajax({
                url:"/calendar/action",
                type:"POST",
                data:{
                    title: title,
                    start: start,
                    end: end,
                    type: 'add'
                },
                success:function(data)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Created Successfully");
                }
            })
        }
    },
    editable:true,
    eventResize: function(event, delta)
    {
        var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
        var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
        var title = event.title;
        var id = event.id;
        $.ajax({
            url:"/calendar/action",
            type:"POST",
            data:{
                title: title,
                start: start,
                end: end,
                id: id,
                type: 'update'
            },
            success:function(response)
            {
                calendar.fullCalendar('refetchEvents');
                alert("Event Updated Successfully");
            }
        })
    },
    eventDrop: function(event, delta)
    {
        var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
        var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
        var title = event.title;
        var id = event.id;
        $.ajax({
            url:"/calendar/action",
            type:"POST",
            data:{
                title: title,
                start: start,
                end: end,
                id: id,
                type: 'update'
            },
            success:function(response)
            {
                calendar.fullCalendar('refetchEvents');
                alert("Event Updated Successfully");
            }
        })
    },

    eventClick:function(event)
    {
        if(confirm("Are you sure you want to remove it?"))
        {
            var id = event.id;
            $.ajax({
                url:"/calendar/action",
                type:"POST",
                data:{
                    id:id,
                    type:"delete"
                },
                success:function(response)
                {   console.log(response)
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Deleted Successfully");
                },

                error:function(response){

                    console.log(response)   
                }
            })
        }
    }
});

$('#addSeance').on('click',function(){

    var route = "{{route('addSeance')}}"
               
               $.ajax({
                   url: route,
                   type: 'post',
                   data: {

                       semestre :$("#semestre").val(),
                       salle:$("#salle").val(),
                       matiere:$("#matiere").val(),
                       groupe:$("#groupe").val(),
                       sousGroupe:$("#sousGroupe").val(),
                       jour:$("#jour").val(),
                       heure:$("#heureSeance").val(),
                       duree:$("#dureeSeance").val(),
} 
,
                   dataType : 'json',
                   success: function (data){
                       calendar.fullCalendar('refetchEvents');
                      
                   },
                   error: function(response) {
                       console.log(response)
                   }
               });
           });


});


$('#getEvents').on('submit',function(){



});
var config = {
            routes: {
                getFormations : "{{route('getFormationsBySession')}}" ,
            }
        }
function afficheFormations(){
               
                $.ajax({
                    url: config.routes.getFormations,
                    type: 'get',
                    data: "session="+$("#session").val(),
                    dataType : 'json',
                    success: function (data){
                        var options =' <option value="null">Séléctionner la formation</option>';
                        for (let index = 0; index < data.length; index++) {
                            const element = data[index];
                            options += ' <option value="'+data[index].id+'">'+data[index].specialite+'</option>'
                        }
                        $("#formation").html(options);
                    },
                    error: function(response) {
                        console.log(response.responseText)
                    }
                });
            }
function afficheSemestres(){
                var route = "{{route('custom_semestres')}}"
                $.ajax({
                    url: route,
                    type: 'get',
                    data: {
                        formation :$("#formation").val(),
                        session : $("#session").val(),

                    } , 
                    dataType : 'json',
                    success: function (data){
                        var options =' <option value="null">Séléctionner le semestre</option>';
                        for (let index = 0; index < data.length; index++) {
                            const element = data[index];
                            options += ' <option value="'+data[index].id+'">'+data[index].intitule_semestre+'</option>'
                        }
                        $("#semestre").html(options);
                    },
                    error: function(response) {
                        console.log(response.responseText)
                    }
                });
            }
            function afficheGroupes(){
                var route = "{{route('custom_groupes')}}"
                $.ajax({
                    url: route,
                    type: 'get',
                    data: "semestre="+$("#semestre").val(),
                    dataType : 'json',
                    success: function (data){
                        var options =' <option value="null">Séléctionner le groupe</option>';
                        for (let index = 0; index < data.length; index++) {
                            const element = data[index];
                            options += ' <option value="'+data[index].id+'">'+data[index].intitule_groupe+'</option>'
                        }

                        $("#groupe").html(options);
                    },
                    error: function(response) {
                        console.log(response.responseText)
                    }
                });
            }
            function afficheSousGroupes(){
                var route = "{{route('custom_sousgroupes')}}"
                $.ajax({
                    url: route,
                    type: 'get',
                    data: "groupe="+$("#groupe").val(),
                    dataType : 'json',
                    success: function (data){
                        var options =' <option value=null>Séléctionner le sous groupe</option>';
                        for (let index = 0; index < data.length; index++) {
                            const element = data[index];
                            options += ' <option value="'+data[index].id+'">'+data[index].intitule_sous_groupe+'</option>'
                        }

                        $("#sousGroupe").html(options);
                    },
                    error: function(response) {
                        console.log(response.responseText)
                    }
                });
            }

            function afficheSalles(){
                var route = "{{route('custom_salles')}}"
          
                $.ajax({
                    url: route,
                    type: 'get',
                    data: {
                        
                        
                        jour:$("#jour").val(),
                        heure:$("#heureSeance").val(),
                        duree:$("#dureeSeance").val(),
                    

                    }
                    ,
                    dataType : 'json',
                    success: function (data){
                        console.log(data)
                        var options =' <option value="null">---  Salle  ---</option>';
                        for (let index = 0; index < data.length; index++) {
                            const element = data[index];
                            options += ' <option value="'+data[index].id+'">'+data[index].label+'</option>'
                        }

                        $("#salle").html(options);
                    },
                    error: function(response) {
                        console.log(response.responseText)
                    }
                });
            }

            function afficheMatieres(){
                var route = "{{route('custom_matieres')}}"
               
                $.ajax({
                    url: route,
                    type: 'get',
                    data: {

                        semestre :$("#semestre").val(),
                        jour:$("#jour").val(),
                        heure:$("#heureSeance").val(),
                        duree:$("#dureeSeance").val(),
                    } 
                    ,
                    dataType : 'json',
                    success: function (data){
                        
                        var options =' <option value="null">---  Matiere  ---</option>';
                        for (let index = 0; index < data.length; index++) {
                            const element = data[index];
                            options += ' <option value="'+data[index].id+'">'+data[index].intitule_matiere+'</option>'
                        }

                        $("#matiere").html(options);
                    },
                    error: function(response) {
                        console.log(response.responseText)
                    }
                });
            }

         
$('#ajoutButton').on('click', function(){
            $("#ajoutModal").modal('show');
        });


        </script>
@endsection
   
