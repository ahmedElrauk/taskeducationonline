<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
        public function __construct()
    {
        $this->middleware(['role:admin_user|teacher']);
    }


    public function newCourse()
    {
        return view('courses.teacher.newCourse');
    }

    public function storeCourse(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:courses',
            'image' => 'required|image',
        ]);

        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image -> move('uploads/courses/' , $image_new_name);
        $course = Course::create(array(
            "name"=>$request->name,
            "image"    => 'uploads/courses/'.$image_new_name,
            "teacher"=>auth()->user()->name
        ));

        return redirect()->back();
    }


    public function edit($id)
    {
        //
        $course = Course::where('id',$id)->first();
        return view('courses.teacher.edit')->with('course',$course);
    }

    public function viewUsers($id){
        $course = Course::find($id);
        $users = $course->users;
        return view('courses.users')->with('users',$users)->with('course',$course);
    }


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
            return redirect()->route('courses.teacher.teacherCourse');

        }else{
            $course->name = $request->name;
            $course->update();
            return redirect()->route('courses.teacher.teacherCourse');
        }
    }

    public function teacherCourse()
    {
        $courses = Course::all();
        $teacher = auth()->user()->name;
        return view('courses.teacher.teacherCourse')->with('courses',$courses)->with('teacher',$teacher);
    }


}
