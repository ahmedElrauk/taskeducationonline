@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">


                    <div class="card-header">My Courses </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">course Name</th>
                            <th scope="col">the students</th>
                            <th scope="col">Edit</th>
                            <th scope="col">image</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            @if ($course->teacher == $teacher)
                                <tr>
                                    <th scope="row">{{$course->name}}</th>
                                    <td scope="row">
                                        <a class="" href="{{route('courses.users',['id' => $course->id])}}">
                                            Show students
                                        </a>
                                    </td>
                                    <td>
                                        <a class="" href="{{route('courses.teacher.edit',['id'=>$course->id])}}">
                                            edit
                                        </a>
                                    </td>

                                    <td scope="row">
                                        <img height="50px" width="50px" src="{{ asset($course->image) }}">
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


