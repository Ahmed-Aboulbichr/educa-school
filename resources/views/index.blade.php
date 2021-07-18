@if ((Auth::user()==null)?false:(Auth::user()->hasRole('User')))
    {{-- si le cas d'un candidature --}}

    <script type="text/javascript">
        window.location.href = "/pre-ins";
    </script>
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
