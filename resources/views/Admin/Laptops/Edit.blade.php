@extends('layoutsAdmin.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit</h1>
                <form action="/admin/laptops/edit" method= "POST">
                @csrf
                <input type="hidden" name="laptopid" id="laptopid" value="{{ $laptop->_id }}">
                <div class="form-group">
                        <label for="laptop_name">Name</label>
                        <input class="form-control" type="text" name="laptop_name" id="laptop_name" value="{{ $laptop->laptop_name }}">
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input class="form-control" type="text" name="brand" id="brand" value="{{ $laptop->brand }}">
                    </div>
                    <div class="form-group">
                        <label for="processor_type">Processor</label>
                        <input class="form-control" type="text" name="processor_type" id="processor_type" value="{{ $laptop->processor_type }}">
                    </div>
                    <div class="form-group">
                        <label for="disk_space">Disk Space</label>
                        <input class="form-control" type="text" name="disk_space" id="disk_space" value="{{ $laptop->disk_space }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ $laptop->price }}">
                    </div>
                <a href="/admin/laptops/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                <button type="submit" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection