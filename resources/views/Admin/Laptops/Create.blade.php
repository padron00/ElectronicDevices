@extends('layoutsAdmin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/admin/laptops/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="laptop_name">Name</label>
                        <input class="form-control" type="text" name="laptop_name" id="laptop_name">
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input class="form-control" type="text" name="brand" id="brand">
                    </div>
                    <div class="form-group">
                        <label for="processor_type">Processor</label>
                        <input class="form-control" type="text" name="processor_type" id="processor_type">
                    </div>
                    <div class="form-group">
                        <label for="disk_space">Disk Space</label>
                        <input class="form-control" type="text" name="disk_space" id="disk_space">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control">
                    </div>
                    <a href="/admin/laptops/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                    </form>
            </div>
        </div>
    </div>
@endsection