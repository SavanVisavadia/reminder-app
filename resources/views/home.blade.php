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

                    {{ __('You are logged in!') }}

                    @foreach ($data as $reminder)
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Reminder</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>{{$reminder->title}}</td>
                            <td>{{$reminder->description}}</td>
                            <td>{{$reminder->reminder}}</td>
                            <td><button type="button" class="btn btn-primary">Primary</button></td>
                        </tr>
                    </table>
                    @endforeach

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection