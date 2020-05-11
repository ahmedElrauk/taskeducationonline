
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">view all courses</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Course Name</th>
                                <th scope="col">Teacher Name</th>
                                <th scope="col">Join or show</th>
                                <th scope="col">Image</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                    <tr>
                                        <th scope="row">{{$course->name}}</th>
                                        <th scope="row">{{$course->teacher}}</th>
                                        <td scope="row">
                                            @if($course->users->count() != 0)
                                                {{$jo = false}}
                                                @foreach($course->users as $user)
                                                    @if ($user->name != auth()->user()->name)
                                                        {{$jo = true}}
                                                        @continue
                                                    @else
                                                        {{$jo = false}}
                                                        <a id="" class="nav-link" href="{{route('course.showCourse',['id' => $course->id])}}" role="button" >
                                                            Show <span class="caret"></span>
                                                        </a>
                                                        @break
                                                    @endif


                                                @endforeach
                                                @if ($jo == true)
                                                    <a id="" class="nav-link" href="{{route('users.join',['id' => $course->id])}}" role="button" >
                                                        join <span class="caret"></span>
                                                    </a>
                                                @endif
                                            @else
                                                <a id="" class="nav-link" href="{{route('users.join',['id' => $course->id])}}" role="button" >
                                                    join <span class="caret"></span>
                                                </a>
                                            @endif
                                        </td>

                                        <td scope="row">
                                            <img height="50px" width="50px" src="{{ asset($course->image) }}">
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
@endsection


