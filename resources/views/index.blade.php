@if ((Auth::user()==null)?false:(Auth::user()->hasRole('User')))
    {{-- si le cas d'un candidature --}}
    @php
        $candidat = App\Candidat::where('user_id', Auth::id())->latest()->first();
    @endphp
    @if ($candidat != null)
        @if ($candidat->completed != 1)
            <script type="text/javascript">
                window.location.href = "{{route('getPreInscr')}}"; //"/pre-ins";
            </script>
        @else
            <script type="text/javascript">
                window.location.href = "{{route('cursus_universitaire.index')}}";
            </script>
        @endif
    @else
        <script type="text/javascript">
            window.location.href = "{{route('getPreInscr')}}"; //"/pre-ins";
        </script>
    @endif        
@else
    {{-- si le cas d'un admin ou bien etudiant --}}

        @extends('layouts.master-educa')
        @section('title') Dashboard  @endsection
        @section('css')
            <!-- DataTables -->
            <link href="{{ URL::asset('/assets/libs/jquery-vectormap/jquery-vectormap.min.css')}}" rel="stylesheet" type="text/css" />
            <!-- Responsive datatable examples -->
            <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
        @endsection
        @section('content')
            <div class="row">

            </div>
            <!-- end row -->
        @endsection
        @section('script')
                <!-- Responsive examples -->
                <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>
        @endsection

@endif
