
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
                            <form method="get" action="{{route('users.search')}}" id="frmsearch" class="float-left" style="margin-bottom:30px;">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control  " id="search" aria-describedby="emailHelp" placeholder="Enter Name">
                                    <div class="input-group-append" id="button-addon4">
                                            <button type="submit" class="btn btn-primary "><i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                            <a href="{{route('users')}}" class="btn btn-secondary" style="margin-left:5px;"type="button">Back</a>
                                    </div>
                                </div>  
                            </form>
                            <div class="result">
                                @if(empty(Request::input('search'))) 
            
                                      @include('users.getusers')
                             </div>
                                @endif
                        </div>
                    
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
 </div>
@endsection

@section('script')

<script src="{{asset('js/main.js')}}"> </script>

@endsection