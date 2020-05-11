@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">the users</div>
                    <div class="col-sm-10">

                        @foreach($users as $user)
                            <label class="checkbox-inline icheckbox">
                                <input type="checkbox"

                                       checked

                                       name="tags[]" id="inlineCheckbox1" value="{{$user->id}}">
                                {{$user->name}}

                            </label>

                        @endforeach
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">user id</th>
                                <th scope="col">user name</th>
                                <th scope="col">For Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td scope="row">{{$user->name}}</td>
                                    <td scope="row">
                                        <a class="" href="{{route('courses.users.delete',['course_id' => $course->id,'user_id' => $user->id])}}">
                                            Delete
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
@endsection


