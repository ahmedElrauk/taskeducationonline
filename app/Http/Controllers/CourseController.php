<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Role;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses.index')
            ->with('courses',Course::all())
            ->with('users',User::all());
    }



//    public function courses()
//    {
//
//        return view('users.courses')
//            ->with('users',User::all())->with('roles',Role::all())->with('courses',Course::all());
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create')->with('users',User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'teacher' => 'required'
        ]);
        //dd($request->all());
        $course = Course::create(array(
            'name'=>$request->name,
            'teacher'=>$request->teacher
        ));
        /*
         * TODO
         * remove tow row
         */
        $course->name = $request->name;
        $course->teacher = $request->teacher;
        //$course->users()->attach();
        $course->users()->attach($request->users);
        //$course->users = User::find(0);
        //$course->save();
        //return redirect()->back();

        return view('courses.index')->with('courses',Course::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        //
        $course = Course::where('id',$id)->first();
        return view('courses.teacher.edit')->with('course',$course);
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
        $course = Course::where('id' , $id)->first();
        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image -> move('uploads/courses/' , $image_new_name);
            $course->name = $request->name;
            $course->image = 'uploads/courses/'.$image_new_name;
            $course->update();
            return redirect()->route('courses');

        }else{
            $course->name = $request->name;
            $course->update();
            return redirect()->route('courses');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewUsers($id){
        $course = Course::find($id);
        $users = $course->users;
        return view('courses.users')->with('users',$users)->with('course',$course);
    }

    public function deleteUser($c_id, $u_id){
        $course = DB::table('course_user')->where('user_id',$u_id)->where('course_id',$c_id)->delete();
        return redirect()->back();
    }

    public function newCourse()
    {
        return view('courses.teacher.newCourse');
    }

//    public function storeCourse(Request $request)
//    {
//        $this->validate($request,[
//            'name' => 'required|unique:courses',
//            'image' => 'required|image',
//        ]);
//
//        $image = $request->image;
//        $image_new_name = time().$image->getClientOriginalName();
//        $image -> move('uploads/courses/' , $image_new_name);
//        $course = Course::create(array(
//            "name"=>$request->name,
//            "image"    => 'uploads/courses/'.$image_new_name,
//            "teacher"=>auth()->user()->name
//        ));
//
//        return redirect()->back();
//    }

//    public function teacherCourse()
//    {
//        $courses = Course::all();
//        $teacher = auth()->user()->name;
//        return view('courses.teacher.teacherCourse')->with('courses',$courses)->with('teacher',$teacher);
//    }

}
