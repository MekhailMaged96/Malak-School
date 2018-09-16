@isadmin
@extends('layouts.admin')
@section('span')

<span>Posts</span>
    
@endsection
@section('admincontent')

<div class="col-md-9 col-sm-9">
    <section class="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                                Latest Posts
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
                                @foreach($posts as $post)
                                    <tr>
                                        <th scope="row">{{$post->id}}</th>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->body}}</td>
                                        <td>{{$post->created_at}}</td>
                                        <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit
                                        <a href="{{route('posts.show',$post->id)}}" class="btn btn-danger">Delete</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
 
@endsection
@endisadmin