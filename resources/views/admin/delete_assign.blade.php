@extends('layouts.main')

@section('content')
<section class="deletepost">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>Are you sure want to delete it </h2><span>{{$user->name}} </span>
                {{Form::open(array('route' => array('delete_assign_course', $user->id))) }}
                {{Form::hidden('_method','DELETE')}}
                    
                    <button class="btn btn-danger">Delete </button>

                {{Form::close()}}
                
                <a href="{{route('assign')}}" class="btn btn-light">Cancel</a>
            </div>
        </div>
    </div>
</section>
@endsection