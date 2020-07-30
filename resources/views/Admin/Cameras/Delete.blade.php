@extends('layoutsAdmin.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/admin/cameras/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="cameraid" id="cameraid" value="{{ $camera->_id }}">
                <div class="form-group">
                        <label for="Model">Model</label>
                        <input class="form-control" type="text" name="Model" id="Model" value="{{ $camera->Model }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Release_date">Release Date</label>
                        <input class="form-control" type="int" name="Release_date" id="Release_date" value="{{ $camera->Release_date }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Max_resolution">Max Resolution</label>
                        <input class="form-control" type="int" name="Max_resolution" id="Max_resolution" value="{{ $camera->Max_resolution }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Low_resolution">Low Resolution</label>
                        <input class="form-control" type="int" name="Low_resolution" id="Low_resolution" value="{{ $camera->Low_resolution }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Dimensions">Dimensions</label>
                        <input class="form-control" type="int" name="Dimensions" id="Dimensions" value="{{ $camera->Dimensions }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="number" name="Price" id="Price" class="form-control" value="{{ $camera->Price }}" disabled>
                    </div>
                    <a href="/admin/cameras/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection