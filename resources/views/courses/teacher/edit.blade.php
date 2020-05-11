@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if($course != null)
                    <div class="card">
                        <div class="card-header">Edit Courses</div>
                        <div class="card-body">
                            <form action="{{route('courses.teacher.update', ['id' => $course->id])}}" enctype="multipart/form-data" method="POST">
                                {{csrf_field()}}
                                @if(count($errors) > 0)
                                    <ul class="navbar-nav mr-auto">
                                        @foreach($errors->all() as $error)
                                            <li class="nav-item dropdown">
                                                <p style="color: red">{{$error}}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp" placeholder="Enter the course name" value="{{ $course->name }}" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="image">Course name</label>
                                    <input type="file" class="form-control" id="image" name="image" value="">
                                    {{--{{ $course->image }}--}}
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection


