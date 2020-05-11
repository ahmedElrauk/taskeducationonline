@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Create Course</div>

                    <div class="card-body">

                        <form action="{{route('courses.teacher.storeCourse')}}" enctype="multipart/form-data" method="POST">
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
                                       aria-describedby="emailHelp" placeholder="Enter the course name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="image">Course name</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


