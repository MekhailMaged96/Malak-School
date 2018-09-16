@extends('layouts.main')

@section('content')
<section class="deletepost">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>Are you sure want to delete it </h2><span>{{$user->name}} </span>
                <form action="{{route('users.destroy',$user->id)}}" method="POST" >
                    @csrf
                    <button class="btn btn-danger">Delete </button>
                    <input type="hidden" name="_method" value="DELETE">
                </form>
                <a href="{{route('users')}}" class="btn btn-light">Cancel</a>
            </div>
        </div>
    </div>
</section>
@endsection