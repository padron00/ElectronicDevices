@extends('layoutsAdmin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $camera->Model}}</b></h4>
                        <p class="card-text"><b>Price: </b> ${{ $camera->Price }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Release Date: </b> {{ $camera->Release_date }}</li>
                        <li class="list-group-item"><b>Max Resolution: </b> {{ $camera->Max_resolution }}</li>
                        <li class="list-group-item"><b>Low Resolution: </b> {{ $camera->Low_resolution }}</li>
                        <li class="list-group-item"><b>Dimensions: </b> {{ $camera->Dimensions }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/cameras/" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Back</a>
                        <a href="/admin/cameras/edit/{{ $camera->_id }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/cameras/delete/{{ $camera->_id }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
