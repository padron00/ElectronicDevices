@extends('layoutsAdmin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Cameras</h1>
                <a class="text-right" href="/admin/cameras/create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Model</th>
                        <th scope="col">Release Date</th>
                        <th scope="col">Max Resolution</th>
                        <th scope="col">Low Resolution</th>
                        <th scope="col">Dimensions</th>
                        <th scope="col">Price</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cameras as $camera)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $camera->Model }}</td>
                        <td>{{ $camera->Release_date }}</td>
                        <td>{{ $camera->Max_resolution }}</td>
                        <td>{{ $camera->Low_resolution }}</td>
                        <td>{{ $camera->Dimensions }}</td>
                        <td>${{ $camera->Price }}</td>
                        <td>
                            <a href="/admin/cameras/{{ $camera->_id }}">Details</a> |
                            <a href="/admin/cameras/edit/{{ $camera->_id }}">Edit</a> |
                            <a href="/admin/cameras/delete/{{ $camera->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection