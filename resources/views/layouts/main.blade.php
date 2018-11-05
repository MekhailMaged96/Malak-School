<!DOCTYPE html>
<html>
 	<head>
		<meta charset="UTF-8">
        <meta name="description" content="malak school">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <!-- CSRF Token -->
      
        <title>malak school</title>
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        
        @yield('stylesheet')
    </head>
    <body>
    <main>
    
      @include('_partials.nav')
      @include('_partials.message')
    



      @yield('content')
        
    </main>
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script  src="{{asset('js/bootstrap.min.js')}}"></script>
    @yield('script')
    </body>
</html>