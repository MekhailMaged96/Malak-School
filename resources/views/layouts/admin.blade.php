@isadmin
@extends('layouts.main')
@section('stylesheet')
<link rel="stylesheet" href="{{asset('css/adminstyle.css')}}" type="text/css">
@endsection
@section('content')
    <section class="head">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    
                    <i class="fa fa-gear" style="font-size:36px;"></i>
                    @yield('span')

                    <h6>Manage your website</h6>
                </div>
                <div class="col-md-2 ">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Create Content
                        </button>
                       
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('users.create')}}">Add User</a>
                        <a class="dropdown-item" href="{{route('posts.create')}}">Add Post</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <div class="container">
       
            <div class="alert alert-secondary" role="alert">
                <a class="{{Request::is('panel')?"active":""}}" href="{{route('panel')}}">DashBoard </a>
                <a class="{{Request::is('/admin/posts')?"active":""}}" href="{{route('posts')}}">Posts</a>
                <a class="{{Request::is('/admin/users')?"active":""}}" href="{{route('users')}}">Users</a>
            </div>
    </div>
    <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <section class="part2">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-gear"></i>
                                <span>DashBoard</span>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="fa fa-user"></i>Users <span class="badge badge-secondary mr-auto">{{$users->count()}}</span></li>
                                <li class="list-group-item"><i class="fa fa-pencil"></i>Posts<span class="badge badge-secondary mr-auto">{{$posts->count()}}</span></li>
                            </ul>
                        </div>
                    </section>
                </div>
                @yield('admincontent')
            </div>
   
        </div>
       @yield('secondpart')
   
@endsection
@endisadmin