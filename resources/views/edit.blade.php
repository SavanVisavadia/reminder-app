@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Reminder</div>

                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('update') }}" method="post">
                        <input type="hidden" name="id" value="{{ $data->id }}" class="form-control" placeholder="id">
                        @csrf
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" value ="{{$data->title}}" class="form-control" id="title" placeholder="Enter title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Description:</label>
                                <input type="text"  value ="{{$data->description}}"  class="form-control" id="description" placeholder="Enter desecription" name="description">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Reminder:</label>
                                <input type="datetime-local" value ="{{$data->reminder}}" class="form-control" id="reminder" placeholder="Select" name="reminder">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
