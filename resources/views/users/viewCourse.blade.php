
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">this course</div>
                    <div class="card-body">
                        <ul class="list-group">
{{--                            {{dd($course->image)}}--}}
                            <img class="img-fluid" alt="Responsive image" src="{{ asset($course->image) }}">
                            <li class="list-group-item">course name: {{$course->name}}</li>
                            <li class="list-group-item">course name: {{$course->teacher}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


