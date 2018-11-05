<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Session;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){

        $this->middleware('admin');
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /****  search  ****/
    public function search(Request $request) {

        if($request->ajax()){

            $users =$this->data($request['search']);
            if(!(empty($request['search']))) 
            {
                $search = $request['search'];
                $view = view('users.getusers',compact('users','search'))->render();
                return response($view);

            }
        }
    }
    public function searchUser(Request $request)
    {
        if($request->ajax()) {

            $users =$this->data($request['search']);
            return view('users.getusers',compact('users','search'))->render();
              
        }
    }
    public function data($search) {
        return $users = User::where('id',$search)->orWhere('email',$search)->orWhere('name',$search)->paginate(1);
 
    }
    /********************************************* */




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|',


        ));
        $user = new User; 

        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->is_admin =false;

        $user->save();


        session()->flash('success', 'User Successfully created!');

        return redirect()->route('users');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user = User::find($id);

        return view('users.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit')->with('user',$user);
        
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
        $this->validate($request,array(

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',


        ));
        $user = User::find($id); 

        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->is_admin =false;

        $user->save();
        session()->flash('success', 'User Successfully Updated!');
        return redirect()->route('users');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        session()->flash('success', 'User Successfully Deleted!');
        return redirect()->route('users');
    }
}
