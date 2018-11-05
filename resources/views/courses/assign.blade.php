@extends('layouts.main')

@section('content')
<section class="assign">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Assign Courses
                    </div>
                    <div class="card-body">
                        <a href="{{route('create_assign')}}" class="btn btn-success" style="margin-bottom:20px;">Create</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">user_id</th>
                                <th scope="col">Username</th>
                                <th scope="col">subject </th>
                                <th scope="col">result  </th>
                                <th scope="col">subject </th>
                                <th scope="col">result </th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $id=0 ?> 
                                @foreach($users as $user)
                                <tr>  
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>

                                       
                                    @foreach ($user->courses as $course)
                                   
                                            <td>{{$course->name}}</td>
                                            <td>{{$course->pivot->result}}</td>
                                    @endforeach
                                    @if(!(count($user->courses)>0))
                                    <td></td>
                                    <td>0</td>
                                    <td></td>
                                    <td>0</td>
                                    @endif
                                   
                                    <td><a href="{{route('edit_assign',$user->id)}}"class="btn btn-primary">Edit</a>
                                        <a href="{{route('delete_assign',$user->id)}}" class="btn btn-danger">Delete</a>
                                    <a href="{{route('getresult',$user->id)}}" class="btn btn-secondary    ">Add Result</a></td>
                                </tr>
                                 @endforeach
                            </tbody>
                          </table>
                        
                    </div>
                </div> 
               
            </div>
        </div>
    </div>
</section>
@endsection


@section('script')

<script src="{{asset('js/select2.min.js')}}"> </script>
<script>
 $(document).ready(function() {   
        $(".js-example-responsive").select2({
            width: 'resolve',
        });
});
</script>


@endsection    