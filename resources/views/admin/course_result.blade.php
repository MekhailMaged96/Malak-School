@isadmin
@extends('layouts.main')

@section('stylesheet')

<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">  
@endsection

@section('content')
<section class="addresult">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="form-add-result">
                    <h2>Add result to Course </h2>
        
                    <form action="{{route('add_result',$user_id)}}" method="Post">
                        @csrf
                       @foreach($user_id->courses as $course) 
                       <div class="form-group">
                       <h5>{{$course->name}}</h5>
                        <input type="text" name="result[]" class="form-control" aria-describedby="emailHelp" value="{{$course->pivot->result}}">
                            
                        </div>
                     
                        @endforeach
                        <input type="submit" class="btn btn-success" value="Submit">
                    </form>
                   
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
@endisadmin