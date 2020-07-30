@extends('layoutsAdmin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Smartphones</h1>
                <a class="text-right" href="/admin/smartphones/create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Generation</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Price</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($smartphones as $smartphone)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $smartphone->name }}</td>
                        <td>{{ $smartphone->generation }}</td>
                        <td>{{ $smartphone->brand }}</td>
                        <td>${{ $smartphone->price }}</td>
                        <td>
                            <a href="/admin/smartphones/{{ $smartphone->_id }}">Details</a> |
                            <a href="/admin/smartphones/edit/{{ $smartphone->_id }}">Edit</a> |
                            <a href="/admin/smartphones/delete/{{ $smartphone->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection