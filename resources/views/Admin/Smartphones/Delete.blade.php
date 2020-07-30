@extends('layoutsAdmin.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/admin/smartphones/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="smartphoneid" id="smartphoneid" value="{{ $smartphone->_id }}">
                <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $smartphone->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="generation">Generation</label>
                        <input class="form-control" type="int" name="generation" id="generation" value="{{ $smartphone->generation }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input class="form-control" type="int" name="brand" id="brand" value="{{ $smartphone->brand }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" class="form-control" value="{{ $smartphone->price }}" disabled>
                    </div>
                    <a href="/admin/smartphones/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection