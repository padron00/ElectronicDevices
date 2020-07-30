@extends('layoutsAdmin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Laptops</h1>
                <a class="text-right" href="/admin/laptops/create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Processor</th>
                        <th scope="col">Disk Space</th>
                        <th scope="col">Price</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($laptops as $laptop)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $laptop->laptop_name }}</td>
                        <td>{{ $laptop->brand }}</td>
                        <td>{{ $laptop->processor_type }}</td>
                        <td>{{ $laptop->disk_space }}</td>
                        <td>${{ $laptop->price }}</td>
                        <td>
                            <a href="/admin/laptops/{{ $laptop->_id }}">Details</a> |
                            <a href="/admin/laptops/edit/{{ $laptop->_id }}">Edit</a> |
                            <a href="/admin/laptops/delete/{{ $laptop->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection