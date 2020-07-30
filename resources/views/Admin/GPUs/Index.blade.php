@extends('layoutsAdmin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>GPUs</h1>
                <a class="text-right" href="/admin/gpus/create">Create New</a>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Architecture</th>
                        <th scope="col">Best Resolution</th>
                        <th scope="col">Manufacturer</th>
                        <th scope="col">Memory</th>
                        <th scope="col">PSU</th>
                        <th scope="col">Pixel Rate</th>
                        <th scope="col">Process</th>

                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($gpus as $gpu)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $gpu->Name }}</td>
                        <td>{{ $gpu->Architecture }}</td>
                        <td>{{ $gpu->Best_Resolution }}</td>
                        <td>{{ $gpu->Manufacturer }}</td>
                        <td>{{ $gpu->Memory }}</td>
                        <td>{{ $gpu->PSU }}</td>
                        <td>{{ $gpu->Pixel_Rate }}</td>
                        <td>{{ $gpu->Process }}</td>
                        <td>
                            <a href="/admin/gpus/{{ $gpu->_id }}">Details</a> |
                            <a href="/admin/gpus/edit/{{ $gpu->_id }}">Edit</a> |
                            <a href="/admin/gpus/delete/{{ $gpu->_id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection