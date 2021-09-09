@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Car Index') }}</div>

                <div class="card-body">

                   <table class="table">
                       <thead>
                           <th>ID</th>
                           <th>Model</th>
                           <th>No. Plate</th>
                           <th>Action</th>
                       </thead>
                       <tbody>
                           @foreach ($cars as $car )
                            <tr>
                                <td>{{$car->id}}</td>
                                <td>{{$car->model}}</td>
                                <td>{{$car->noplate}}</td>
                                <td>
                                    <a href="{{route('car:show', $car)}}" class="btn btn-primary">Show</a>
                                    <a href="{{route('car:edit', $car)}}" class="btn btn-success">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete?')" href="{{route('car:destroy', $car)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                       </tbody>
                   </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
