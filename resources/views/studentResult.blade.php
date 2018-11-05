@extends('layouts.main')

@section('content')
<section class="studentres">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <div class="inform-top">
                <h3>Name :</h3><span style="text-transform: capitalize;"> {{auth()->user()->name}}</span>
                <div class="inform">
                  <h3>Email :</h3><span>{{auth()->user()->email}}</span>
                </div>
            </div>
            <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Result out of 100</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->courses as $course)
                    <tr>
                    <th scope="row">{{$course->id}}</th>
                        <td>{{$course->name}}</td>
                        <td>{{$course->pivot->result}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>   
            </div>
        </div>
    </div>
</section>




@endsection