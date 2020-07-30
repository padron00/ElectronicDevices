@extends('layoutsAdmin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/admin/cameras/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="Model">Model</label>
                        <input class="form-control" type="text" name="Model" id="Model">
                    </div>
                    <div class="form-group">
                        <label for="Release_date">Release Date</label>
                        <input class="form-control" type="int" name="Release_date" id="Release_date">
                    </div>
                    <div class="form-group">
                        <label for="Max_resolution">Max Resolution</label>
                        <input class="form-control" type="int" name="Max_resolution" id="Max_resolution">
                    </div>
                    <div class="form-group">
                        <label for="Low_resolution">Low Resolution</label>
                        <input class="form-control" type="int" name="Low_resolution" id="Low_resolution">
                    </div>
                    <div class="form-group">
                        <label for="Dimensions">Dimensions</label>
                        <input class="form-control" type="int" name="Dimensions" id="Dimensions">
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="number" name="Price" id="Price" class="form-control">
                    </div>
                    <a href="/admin/cameras/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                    </form>
            </div>
        </div>
    </div>
@endsection