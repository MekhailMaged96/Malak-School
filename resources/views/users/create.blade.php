@extends('layouts.main')

@section('content')
<section class="adduser">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                
                <div class="form-user-add">
                    <h2> Add User </h2>
                    <form action="{{route('users.store')}}" method="Post">
                        @csrf
                        <label>Name: </label>
                        <input type="text" placeholder="Name" name="name">

                        <label>Email: </label>
                        <input type="text" placeholder="Email" name="email">

                        <label> Password: </label>
                        <input type="password" placeholder="Password" name="password">
                        
                        <input type="submit" class="btn btn-success" value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection