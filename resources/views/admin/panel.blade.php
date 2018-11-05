
@extends('layouts.admin')
@section('span')

<span>DashBoard</span>
    
@endsection
@section('admincontent')
<div class="col-md-9">
    <section class="part3">
            <div class="card">
                <div class="card-header">
                    Website Overview
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="card-body lead">
                                <h5 class="card-title"><i class="fa fa-user" style="font-size:3em; color:#000;"></i></h5><span>{{$userscount->count()}}</span>
                                <p class="card-text">Users</p>
                              
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="card-body lead">
                            <h5 class="card-title"><i class="fa fa-book" style="font-size:3em; color:#000;"></i></h5><span>{{$courses->count()}}</span>
                                <p class="card-text">Courses</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="card-body lead">
                            <h5 class="card-title"><i class="fa fa-pencil" style="font-size:3em; color:#000;"></i></h5><span>{{$posts->count()}}</span>
                                <p class="card-text">Posts</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="card-body lead">
                                <h5 class="card-title"><i class="fa fa-bar-chart" style="font-size:3em; color:#000;"></i></h5><span>225</span>
                                <p class="card-text">Vistors</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('secondpart')
<section class="lastpart">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                              Latest Users
                        </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created_at</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($lastusers as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                            </tr>
                            @endforeach
                                
                               
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
</section>
@endsection