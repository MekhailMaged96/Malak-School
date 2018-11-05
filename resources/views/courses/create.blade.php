@extends('layouts.main')

@section('content')
<section class="addcourse">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                
                <div class="form-course-add">
                    <h2> Add Course </h2>
                    <form action="{{route('courses.store')}}" method="Post">
                        @csrf
                        <label>Name: </label>
                        <input type="text" placeholder="Name" name="name">
                        <input type="submit" class="btn btn-success" value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection