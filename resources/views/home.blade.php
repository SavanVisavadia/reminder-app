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
                            <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
                                <a href="{{route('edit',$reminder->id)}}" class="btn btn-primary">Edit</a>
                                <a 
                        href="javascript:void(0)" 
                        id="delete-user" 
                        data-url="{{ route('delete', $reminder->id) }}" 
                        class="btn btn-danger"
                        >Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                   
                    
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
      
    $(document).ready(function () {
   
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      
        $('body').on('click', '#delete-user', function () {
  
          var userURL = $(this).data('url');
          var trObj = $(this);
  
          if(confirm("Are you sure you want to remove this user?") == true){
                $.ajax({
                    url: userURL,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(data) {
                        alert(data.success);
                        trObj.parents("tr").remove();
                        window.location.reload();
                    }
                });
          }
  
       });
        
    });
    
</script>
</div>
@endsection

