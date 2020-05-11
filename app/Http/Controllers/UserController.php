<?php

namespace App\Http\Controllers;

use App\Course;
use App\Role;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct()
//    {
//        $this->middleware(['role:admin_user']);
//    }

    public function index()
    {

        return view('users.index')->with('users',User::all())->with('roles',Role::all());
    }

    public function courses()
    {

        return view('users.courses')
            ->with('users',User::all())->with('roles',Role::all())->with('courses',Course::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return view('courses.store');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('myRoles',Role::all())->with('user',$user);
    }

    public function newCourse()
    {
        return view('users.edit');
    }

    public function teacherCourse($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('myRoles',Role::all())->with('user',$user);
    }

    public function viewCourses()
    {
        $courses = Course::all();
//        $id = auth()->user()->id;
//        $teacher = auth()->user()->name;
          //dd($courses);
        return view('users.courses')->with('courses',$courses);
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id',$id)->first();
        $this->validate($request,[
            'name' => 'required',
            'roles' => 'required|array|min:1',
        ]);

        $requestData = $request->except('email');
        $user->save();
        $user->syncRoles($request->roles);

        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id)
//    {
//        $user = User::find($id);
//        $user->delete();
//        return redirect()->back();
//    }

    public function join($id)
    {
        $course = Course::find($id);
        $user = auth()->user();

        $course->users()->attach($user);

        return redirect()->back();

    }
    public function showCourse($id)
    {
        $course = Course::find($id);

        //dd($course->image);

        return view('users.viewCourse')->with('course',$course);

    }
}

