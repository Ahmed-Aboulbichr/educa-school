@forelse($Type_formations as $type)
    <div class="col-lg-4">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary">
                <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow mr-3"></i>{{$type->specialite}}</h5>
            </div>
            <div class="card-body">
                {{-- <h5 class="card-title mt-0">card title</h5> --}}
                <p class="card-text">Cliquer pour voir toutes les candidatures du formation {{$type->specialite}}.</p>

            </div>
            <a href="{{ route('candidatures.show', [$type->id]) }}" class="btn btn-primary waves-effect waves-light m-3">Les candidatures</a>
        </div>
    </div>
@empty
<div class="col-12">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="mdi mdi-check-all mr-2"></i>
            Aucun formation trouvé dans cette session universitaire
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endforelse
