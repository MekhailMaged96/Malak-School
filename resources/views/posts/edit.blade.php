@extends('layouts.main')

@section('content')
<section class="postcreate">   
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-sm-8 ">
                <div class="formadd">
                    <h5>Edit Post </h5>
                    {!! Form::open(array('route' => ['posts.update',$post->id],'files'=>true)) !!}

                        <input type="hidden" name="_method" value="PUT">

                        <label>Title: </label>
                        <input type="text" name="title" placeholder="{{$post->title}}">

                        <label>Body: <label>
                        <input type="text" name="body" placeholder="{{$post->body}}">

                        <label>Pervious image <label>
                        <img src="{{asset('images/'.$post->img)}}">

                        {{ Form::label('image_uploaded','upload image:') }}
                        {{ Form::file('img')}}

                        <input type="submit" value="update">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div> 
</section>


@endsection


