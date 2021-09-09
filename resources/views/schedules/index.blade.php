@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Schedule Index') }}</div> --}}
                <div class="card-header">{{ __('Schedule Index') }}
                    <div class="float-right">
                        <form action="" method="">
                            <div class="input-group">
                                <input type="text" class="form-control" name="keyword" value="{{ request()->get('keyword')}}"/>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">

                   <table class="table">
                       <thead>
                           <th>ID</th>
                           <th>TITLE</th>
                           <th>DESCRIPTION</th>
                           <th>CREATOR</th>
                           <th>ACTION</th>
                       </thead>
                       <tbody>
                           @foreach ($schedules as $schedule )


                            <tr>
                                <td>{{$schedule->id}}</td>
                                <td>{{$schedule->title}}</td>
                                <td>{{$schedule->description}}</td>
                                <td>{{$schedule->user->name}}</td>
                                <td>
                                    <a href="{{route('schedule:show', $schedule)}}" class="btn btn-primary">Show</a>
                                    <a href="{{route('schedule:edit', $schedule)}}" class="btn btn-success">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete?')" href="{{route('schedule:destroy', $schedule)}}" class="btn btn-danger">Delete</a>
                                    <hr>
                                    <a onclick="return confirm('Are you sure want to force delete?')" href="{{ route('schedule:force-destroy', $schedule) }}" class="btn btn-danger">Force Delete</a>

                                </td>
                            </tr>
                            @endforeach
                       </tbody>
                   </table>
                {{-- {{$schedules->links()}} --}}
                {{ $schedules->appends(['keyword' => request()->get('keyword')])->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
