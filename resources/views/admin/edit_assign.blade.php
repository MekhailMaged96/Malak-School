@isadmin
@extends('layouts.main')

@section('stylesheet')

<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">  
@endsection

@section('content')
<section class="adduser">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                
                <div class="form-user-add">
                    <h2>Edit Course To User </h2>
                    <form action="{{route('edit_assign_course',$user->id)}}" method="Post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <label>UserName</label>
                        <h5>{{$user->name}} </h5>
                        <label>Courses: </label>
                        
                        <select  class="form-control js-example-responsive" name="courses[]"  multiple="multiple" style="width:100%;" > 
                            @foreach($courses as $course)
                            <option value="{{$course->id}}" @foreach($user->courses as $coursee) {{ $coursee->id == $course->id ? 'selected="selected"' : '' }} @endforeach>{{$course->name}}</option>
                            @endforeach
                        </select>
                        
                     

                        <input type="submit" class="btn btn-success" value="Submit">
                    </form>
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
@endisadmin