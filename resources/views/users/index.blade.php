@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">the users</div>

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
                                            {{$role->display_name}}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="" href="{{route('user.edit',['id'=>$user->id])}}">
                                            edit
                                        </a>
                                    </td>
                                    <td>
                                        <a class="dropdown-item" href="{{route('user.delete',['id'=>$user->id])}}">
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
@endsection


