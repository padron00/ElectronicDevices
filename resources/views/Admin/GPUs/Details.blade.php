@extends('layoutsAdmin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $gpu->Name}}</b></h4>
                        <p class="card-text"><b>Architecture: </b> {{ $gpu->Architecture }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Best Resolution: </b> {{ $gpu->Best_Resolution }}</li>
                        <li class="list-group-item"><b>Manufacturer: </b> {{ $gpu->Manufacturer }}</li>
                        <li class="list-group-item"><b>Memory: </b> {{ $gpu->Memory }}</li>
                        <li class="list-group-item"><b>PSU: </b> {{ $gpu->PSU }}</li>
                        <li class="list-group-item"><b>Pixel Rate: </b> {{ $gpu->Pixel_Rate }}</li>
                        <li class="list-group-item"><b>Process: </b> {{ $gpu->Process }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/gpus/" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Back</a>
                        <a href="/admin/gpus/edit/{{ $gpu->_id }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/gpus/delete/{{ $gpu->_id }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
