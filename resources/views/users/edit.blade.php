@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Edit user {{$user->name}}</div>

                    <div class="card-body">

                        <form action="{{route('user.update',['id' => $user->id ])}}" method="post" autocomplete="on">
                            {{ csrf_field()}}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            </div>
{{--ccc--}}

                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Roles
                                </label>
                                <br>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline icheckbox">
                                        <input type="checkbox" name="roles[]" id="inlineCheckbox1" value="admin_user"
                                            {{ $user->hasRole('admin_user') ? 'checked' : '' }}> admin_user
                                    </label>
                                </div>
                                <br>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline icheckbox">
                                        <input type="checkbox" name="roles[]" id="inlineCheckbox1" value="teacher"
                                            {{ $user->hasRole('teacher') ? 'checked' : '' }}> teacher
                                    </label>
                                </div>
                                <br>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline icheckbox">
                                        <input type="checkbox" name="roles[]" id="inlineCheckbox1" value="n_user"{{ $user->hasRole('n_user') ? 'checked' : '' }}> User
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


