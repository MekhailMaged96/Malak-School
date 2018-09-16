<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Image;
use Storage;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'title' =>'required|max:199',
            'body'  =>'required',
            'img'=>'image',
        ));
        $post = new Post;
        $post->title=$request->title;
        $post->body =$request->body;

        if($request->hasfile('img'))
        {
            $image = $request->file('img');
            $filename= time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,600)->save( $location);
            $post->img= $filename;

        }
        $post->save();
        session()->flash('success', 'Post Successfully Created!');
        return redirect()->route('posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post =Post::find($id);
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,array(
            'title' =>'required|max:199',
            'body'  =>'required',
            'img'=>'image',
        ));

        $post = Post::find($id);
        $post->title=$request->title;
        $post->body =$request->body;
        
        if($request->hasfile('img'))
        {
            $image = $request->file('img');
            $filename= time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save( $location);
            
            $oldfile = $post->img;
            //update the database 
            $post->img= $filename;

          
            //delete the image
            Storage::delete($oldfile);

        }

        $post->save();
        session()->flash('success', 'Post Successfully Updated!');
        return redirect()->route('posts');
    }

 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

      $post = Post::find($id);

      return view('posts.show')->with('post',$post);
    }

    
    public function destroy($id)
    {
        $post = Post::find($id);

        Storage::delete($post->img);
        
        $post->delete();

        session()->flash('success', 'Post Successfully Deleted!');
        return redirect()->route('posts');
        
    }
}
