@extends('layouts.main')

@section('content')
<section class="adduser">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                
                <div class="form-user-add">
                    <h2> Edit User </h2>
                    <form action="{{route('users.update',$user->id)}}" method="POST">
                        
                        @csrf
                        <label>Name: </label>
                        <input type="text" placeholder="{{$user->name}}" name="name">

                        <label>Email: </label>
                        <input type="text" placeholder="{{$user->email}}" name="email">

                        <label> Password: </label>
                        <input type="password" placeholder="Password" name="password">
                        
                        <input type="submit" class="btn btn-primary" value="Edit">

                        <input type="hidden" name="_method" value="PUT">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection