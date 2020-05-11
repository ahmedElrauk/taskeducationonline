<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Course;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

        public function __construct()
    {
        $this->middleware(['role:admin_user']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::orderBy('created_at','desc')->take(5)->get();
        $users = User::orderBy('created_at','desc')->take(5)->get();
        //return view('courses.teacher.edit')->with('course',$course);
        return view('admin.index')->with('courses',$courses)->with('users',$users);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('myRoles',Role::all())->with('user',$user);
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

    public function allCourses()
    {
        return view('courses.index')
            ->with('courses',Course::all())
            ->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
