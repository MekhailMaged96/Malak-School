  <!----------- navbar ------------------------>
@extends('layouts.main')

@section('content')

      
  <!------------------ end  navbar----------------------------->
  <section class="part1" >
      <div class="img-contain">
          <img src="img/Elegant_Background-8.jpg" alt="center img">
           <div class="overlay-par">
               <h3>St. Stephen 's <span>School</span> and Saint phoebe</h3>
          </div>
      </div>
     
  </section>
  <section class="part2">
      <div class="container">
          <h2>LATEST NEWS</h2>
          @foreach($posts as $post) 
          <div class="post">
            
                  <div class="row">
                    
                          <div class="col-sm-5">
                              <img src="images/{{$post->img}}">
                          </div>
                          <div class="col-sm-7">
                              <article class="post-body">
                                  <h5>{{$post->title}}</h5> <span>{{$post->created_at}}</span>
                                  <p>{{$post->body}}</p>
                              </article>
                          </div>
                        
                  </div>
              </div>
            @endforeach
           <div class="post">
            
                  <div class="row">
                          <div class="col-sm-5">
                              <img src="img/IMG_4218.jpg">
                          </div>
                          <div class="col-sm-7">
                              <article class="post-body">
                                  <h5>Post title</h5> <span>post date</span>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore.

                                      Learn Center Template goes with two packages – with PSD source files and without them. PSD source files are available for free for the registered members of Templates.com. The basic package (without PSD source is available for anyone without registration).</p>
                              </article>
                          </div>
                  </div>
              </div>
          
      </div>
  </section>
  <footer>
     <div class="foot">
     
          <div class="fafont">
              <i class="fa fa-facebook-official"></i>
              <i class="fa fa-instagram" ></i>
          </div>
          <h5> &#64;Copy Righy by knets al malak wel romany - All Rights Reserved</h5>
      </div>
  
  </footer> 

@endsection