@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
<div class="row">
<div class="col-md-6">

    <div class="card">
        <div class="card-header">last courses</div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Course Name</th>
                    <th scope="col">The teacher</th>
                    <th scope="col">Num of student</th>
                    <th scope="col">Edit</th>
                    <th scope="col">image</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <th scope="row">{{$course->name}}</th>
                        <td scope="row">
                            {{$course->teacher}}
                        </td>
                        <td scope="row">
                            <a class="" href="{{route('courses.users',['id' => $course->id])}}">
                                {{ count($course->users) }}
                            </a>
                        </td>
                        <td>
                            <a class="" href="{{route('courses.teacher.edit',['id'=>$course->id])}}">
                                edit
                            </a>
                        </td>
                        {{--<td>--}}
                        {{--<a class="dropdown-item" href="{{route('user.delete',['id'=>$course->id])}}">--}}
                        {{--delete--}}
                        {{--</a>--}}
                        {{--</td>--}}

                        <td scope="row">
                            <img height="50px" width="50px" src="{{ asset($course->image) }}">
                        </td>
                    </tr>
                @endforeach

                <a class="" href="{{route('courses.create')}}">
                    Add new course
                </a>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-6">

    <div class="card">
        <div class="card-header">last users</div>

        <div class="card-body">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->name}}</th>
                        <td scope="row">
                            @foreach($user->roles as $role)
                                {{$role->display_name}} |
                            @endforeach
                        </td>
                        <td>
                            <a class="" href="{{route('user.edit',['id'=>$user->id])}}">
                                edit
                            </a>
                        </td>
                        <td>
                            <a class="" href="{{route('user.delete',['id'=>$user->id])}}">
                                delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
            </div>
        </div>
    </div>
@endsection


