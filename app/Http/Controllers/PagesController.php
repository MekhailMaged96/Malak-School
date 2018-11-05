<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\Course;
use Mail;
class PagesController extends Controller
{
    public function Index() {

        $posts = Post::all();
        

        return view('index')->with('posts',$posts);
    }
    
    public function adminpanel() {
        $posts = Post::all();
        $userscount = User::where('is_admin',false)->get();
        $lastusers = User::where('is_admin',false)->orderBy('created_at', 'desc') ->get();
        $courses= Course::all();
        return view('admin.panel')->with('posts',$posts)->with('userscount',$userscount)->with('lastusers',$lastusers)->with('courses',$courses);

    }
    public function posts() {
        $posts = Post::all();
        $userscount = User::where('is_admin',false)->get();
        $courses= Course::all();
        return view('admin.posts')->with('posts',$posts)->with('userscount',$userscount)->with('courses',$courses);;
    }
    public function users() {
        $users=User::where('is_admin',false)->paginate(1);
        $posts = Post::all();
        $userscount = User::where('is_admin',false)->get();
        $courses= Course::all();
        return view('admin.users')->with('courses',$courses)->with('users',$users)->with('userscount',$userscount)->with('posts',$posts);

    } 
    public function courses() {
        $posts = Post::all();
        $userscount  = User::where('is_admin',false)->get();
        $courses= Course::all();
        return view('admin.courses')->with('posts',$posts)->with('userscount',$userscount)->with('courses',$courses);
    }
    public function assign() {
      
    
     
        //$users = User::where('is_admin', false)->with('courses')->paginate(2);

        $users = User::where('is_admin', false)->with('courses')->get();
        $courses=Course::all();
        return view('courses.assign')->with('users',$users)->with('courses',$courses);
    }
    public function create_assign() {

        $posts = Post::all();
        $users  = User:: whereDoesntHave('courses')->where('is_admin',false)->get();
        $courses= Course::all();
        return view('admin.create_assign')->with('posts',$posts)->with('users',$users)->with('courses',$courses);

     
    }
    public function edit_assign($id) {

        $posts = Post::all();
        $user  = User::find($id);
        $courses= Course::all();
        return view('admin.edit_assign')->with('posts',$posts)->with('user',$user)->with('courses',$courses);

     
    }
    public function delete_assign($id) {

        $user = User::find($id);
     
        return view('admin.delete_assign')->with('user',$user);
    }

    public function studentResult() {
        $id=auth()->user()->id;
        $user=User::find($id);

        return view('studentResult')->with('user',$user);
    }

    public function getContact() {

        return view('contact');
    }

    public function postContact(Request $request) {
      
        $data = array(
            'email' =>$request->email,
            'messageBody' =>$request->message,
            'subject' =>$request->subject


        );
        Mail::send('email.contact',$data,function($messsage) use ($data)
        {
            $messsage->from($data['email']);
            $messsage->to('mekhailmaged@gmail.com');
            $messsage->subject($data['subject']);

        });
       session()->flash('success', 'Message Successfully send!');
       return redirect('/');
       
    
    }
}
