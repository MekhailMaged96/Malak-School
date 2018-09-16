@extends('layouts.main')

@section('content')
<section class="postcreate">   
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-sm-8 ">
                <div class="formadd">
                    <h5>Create Post </h5>
                    {!! Form::open(array('route' => 'posts.store','files'=>true)) !!}
                        <label>Title: </label>
                        <input type="text" name="title">

                        <label>Body: <label>
                        <input type="text" name="body">

                        <label>Upload image: <label>
                        {{ Form::file('img')}}

                        <input type="submit" value="Create">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div> 
</section>


@endsection


