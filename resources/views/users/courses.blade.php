
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">create posts</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($courses as $course)
                                <li class="list-group-item"> course name: {{$course->name}}
                                    , the teacher : {{$course->teacher}}

{{--                                    {{dd($course->users->count())}}--}}
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

{{--                                    <a id="" class="nav-link" href="{{route('course.showCourse',['id' => $course->id])}}" role="button" >--}}
{{--                                        Show <span class="caret"></span>--}}
{{--                                    </a>--}}
                                </li>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


