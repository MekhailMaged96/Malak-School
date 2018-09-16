
@extends('layouts.admin')
@section('span')

<span>Users</span>
    
@endsection
@section('admincontent')

<div class="col-md-9">
<div class="container margin-top">
    <div class="row">
        <div class="col-sm-12">
            <section class="posts" >
                <div class="card">
                    <div class="card-header">
                            Users
                    </div>
                    <div class="card-body">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created_at</th>
                                    <th scope="col">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-primary">Edit
                                        <a href="{{route('users.show',$user->id)}}" class="btn btn-danger">Delete</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
 </div>
@endsection
