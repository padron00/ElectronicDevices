@extends('layoutsAdmin.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/admin/gpus/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="gpuid" id="gpuid" value="{{ $gpu->_id }}">
                <div class="form-group">
                        <label for="Name">Name</label>
                        <input class="form-control" type="text" name="Name" id="Name" value="{{ $gpu->Name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Architecture">Architecture</label>
                        <input class="form-control" type="int" name="Architecture" id="Architecture" value="{{ $gpu->Architecture }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Best_Resolution">Best Resolution</label>
                        <input class="form-control" type="int" name="Best_Resolution" id="Best_Resolution" value="{{ $gpu->Best_Resolution }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Manufacturer">Manufacturer</label>
                        <input class="form-control" type="int" name="Manufacturer" id="Manufacturer" value="{{ $gpu->Manufacturer }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Memory">Memory</label>
                        <input class="form-control" type="int" name="Memory" id="Memory" value="{{ $gpu->Memory }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="PSU">PSU</label>
                        <input class="form-control" type="int" name="PSU" id="PSU" value="{{ $gpu->PSU }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Pixel_Rate">Pixel Rate</label>
                        <input class="form-control" type="int" name="Pixel_Rate" id="Pixel_Rate" value="{{ $gpu->Pixel_Rate }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Process">Process</label>
                        <input class="form-control" type="int" name="Process" id="Process" value="{{ $gpu->Process }}" disabled>
                    </div>
                    <a href="/admin/gpus/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection