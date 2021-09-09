@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Car Show') }}</div>

                <div class="card-body">

                    <div class="form-group">
                        <label>Model Name</label>
                        <input type="text" name="model" class="form-control" value="{{$car->model}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Plate Number</label>
                        <input type="text" name="noplate" class="form-control" value="{{$car->noplate}}" readonly>
                    </div>
                    <div class="form-group">
                         <a class="btn btn-link" href="{{ route('car:index')}}">Back</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
