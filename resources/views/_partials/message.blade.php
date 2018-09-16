
@if(Session::has('success'))

<div class="alert alert-success mt-0 mb-0" role="alert">

    <strong>Success: </strong>{{Session::get('success') }}
    
</div>


@endif

@if(count($errors)>0)
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-9 ">
            <div class="alert alert-danger mt-0 mb-0" style="margin:0px;" role="alert">
                    <strong>Errors:</strong>
                @foreach($errors->all() as $error )
                <p> {{$error}} </p> 
                @endforeach 
            </div>
        </div>
    </div>
</div>

@endif
