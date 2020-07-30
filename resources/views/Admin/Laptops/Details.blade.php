@extends('layoutsAdmin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $laptop->laptop_name}}</b></h4>
                        <p class="card-text"><b>Price: </b> ${{ $laptop->price }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Brand: </b> {{ $laptop->brand }}</li>
                        <li class="list-group-item"><b>Processor: </b> {{ $laptop->processor_type }}</li>
                        <li class="list-group-item"><b>Disk Space: </b> {{ $laptop->disk_space }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/laptops/" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Back</a>
                        <a href="/admin/laptops/edit/{{ $laptop->_id }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/laptops/delete/{{ $laptop->_id }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
