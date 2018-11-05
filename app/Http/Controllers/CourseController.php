<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
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
            'name' =>'unique:courses|required|max:199',
        
        ));
        $course = new Course;
        $course->name=$request->name;
        $course->save();
        session()->flash('success', 'Course Successfully Created!');
        return redirect()->route('panel');
        
    }
    public function assign_course(Request $request) {
        
        $user =User::find($request->user_id);
        
        $user->courses()->sync($request->courses,false);

        session()->flash('success', 'Assign Successfully Created!');
        return redirect()->route('assign');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);

        return response()->json(($course));
    }

    /***** add course result  ******/

    public function getresult($id) {

        $user_id = User::find($id);
        
        return view('admin.course_result')->with('user_id',$user_id);

    }
    public function addresult($id,Request $request) {
        $result=[];
        $this->validate($request,array(
           'result.*'=>'integer'
        
        ));
        
        $user =User::find($id);
        $id=0;
       
        
       foreach($user->courses as $course){

        $course->pivot->result=$request->result[$id++];
        $course->pivot->save();
       }
       session()->flash('success', 'Result Assigned Successfully!');
       return redirect()->route('assign');
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
    }
 

    public function update(Request $request,$id) {

        $course = Course::find($id);
        $course->name = $request->name;
        $course->save();
        return response()->json(($course));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_assign (Request $request, $id)
    {
         
        $user =User::find($request->user_id);
     
        if(isset($request->courses)) {

        $user->courses()->sync($request->courses,true);
        } else {
            $user->courses()->sync(array());
        }
        session()->flash('success', 'Assign Successfully Updated!');
        return redirect()->route('assign');
        

        
    }
    public function delete_assign(Request $request,$id) {
        $user = User::find($id);

        $user->courses()->detach();

        session()->flash('success', 'Assign Successfully Deleted!');
        return redirect()->route('assign');
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return response()->json(($course));
 
    }
}
