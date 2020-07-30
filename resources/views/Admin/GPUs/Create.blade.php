@extends('layoutsAdmin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/admin/gpus/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input class="form-control" type="text" name="Name" id="Name">
                    </div>
                    <div class="form-group">
                        <label for="Architecture">Architecture</label>
                        <input class="form-control" type="text" name="Architecture" id="Architecture">
                    </div>
                    <div class="form-group">
                        <label for="Best_Resolution">Best Resolution</label>
                        <input class="form-control" type="text" name="Best_Resolution" id="Best_Resolution">
                    </div>
                    <div class="form-group">
                        <label for="Manufacturer">Manufacturer</label>
                        <input class="form-control" type="text" name="Manufacturer" id="Manufacturer">
                    </div>
                    <div class="form-group">
                        <label for="Memory">Memory</label>
                        <input class="form-control" type="text" name="Memory" id="Memory">
                    </div>
                    <div class="form-group">
                        <label for="PSU">PSU</label>
                        <input class="form-control" type="text" name="PSU" id="PSU">
                    </div>
                    <div class="form-group">
                        <label for="Pixel_Rate">Pixel Rate</label>
                        <input class="form-control" type="text" name="Pixel_Rate" id="Pixel_Rate">
                    </div>
                    <div class="form-group">
                        <label for="Process">Process</label>
                        <input class="form-control" type="text" name="Process" id="Process">
                    </div>
                    <a href="/admin/gpus/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                    </form>
            </div>
        </div>
    </div>
@endsection