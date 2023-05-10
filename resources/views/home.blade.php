@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('create')}}" class="btn btn-primary">Create Reminder</a>
                   
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Reminder</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($data as $reminder)
                        <tr>
                            <td>{{$reminder->title}}</td>
                            <td>{{$reminder->description}}</td>
                            <td>{{$reminder->reminder}}</td>
                            <td>
                                <a href="{{route('edit',$reminder->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('delete',$reminder->id)}}" class="btn btn-primary">Delete</a> 
                            </td>
                        </tr>
                        @endforeach
                    </table>
                   

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
