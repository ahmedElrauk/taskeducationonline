@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">create posts</div>

                    <div class="card-body">

                        <form action="{{route('courses.store')}}" enctype="multipart/form-data" method="POST">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="mjn">choose teacher</label>
                                <select class="form-control" name="teacher" >
                                    @foreach($users as $user)
                                        @if ($user->hasRole('teacher'))
                                            <option >{{$user->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-check">
                                @foreach($users as $user)
                                    <input type="checkbox" class="form-check-input" value="{{$user->id}}" name="users[]">
                                    <label class="form-check-label" for="default">{{$user->name}}</label>
                                    </br>
                                @endforeach
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="mjn">choose user</label>--}}
{{--                                <select class="form-control" name="user" >--}}
{{--                                    @foreach($users as $user)--}}
{{--                                        @if ($user->hasRole('n_user'))--}}
{{--                                            <option >{{$user->name}}</option>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

                            <div class="form-group">
                                <label for="name">the title</label>
                                <input type="text" class="form-control" name="name" >
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="contentt">Example textarea</label>--}}
{{--                                <textarea class="form-control" name="contentt" rows="3"></textarea>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="featured">Add photo</label>--}}
{{--                                <input type="file" class="form-control-file" name="featured">--}}
{{--                            </div>--}}

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


