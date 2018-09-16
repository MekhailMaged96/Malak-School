<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
class PagesController extends Controller
{
    public function Index() {

        $posts = Post::all();
        

        return view('index')->with('posts',$posts);
    }
    
   public function adminpanel() {
        $posts = Post::all();
        $users = User::where('is_admin',false)->get();
        $lastusers = User::where('is_admin',false)->orderBy('created_at', 'desc') ->get();
        return view('admin.panel')->with('posts',$posts)->with('users',$users)->with('lastusers',$lastusers);

    }
   public function posts() {
        $posts = Post::all();
        $users = User::where('is_admin',false)->get();
        return view('admin.posts')->with('posts',$posts)->with('users',$users);
    }
   public function users() {
        $posts = Post::all();
        $users = User::where('is_admin',false)->get();
       
        return view('admin.users')->with('posts',$posts)->with('users',$users);

    }   
}
