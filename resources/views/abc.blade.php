@extends('layouts.master')
@section('content')

    <div class="box box-primary">
        <form role="form"  action="/user" method="post" enctype="multipart/form-data">

        {{csrf_field()}}

        <!-- header create new user -->
            <div class="box-header with-border">
                <h3 class="box-title">Create New User</h3>
            </div>

            <!-- body for input and submit -->
            <div class="row">
                <div class="box-body">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name='name' class="form-control" id="username" placeholder="username">
                            <span>{{$errors->first('name')}}</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Nickname</label>
                            <input type="text" name='nickname' class="form-control" id="nickname" placeholder="nickname">
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="box-body">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="radio">
                                <label><input type="radio" name="gender" value="1">male</label>
                                <label>&nbsp;</label>
                                <label><input type="radio" name="gender" value="0">female</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <div style="position:relative;">
                                <a class='btn btn-primary' href='javascript:;'>
                                    Choose Image...
                                    <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="image" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                                </a>
                                <span class='label label-info' id="upload-file-info"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="box-body">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                                <input id="email" type="text" class="form-control" name="email" placeholder="email">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input id="email" type="password" class="form-control" name="password" placeholder="password">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>

            </div>

        </form>
    </div>


@endsection


{{--//use for--}}
@extends('layouts.master')
@section('content')

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">DetailView User</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                {{--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive ">
                <table class="table no-margin table-hover">
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Nick Name</th>
                        <th>Gender</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Current Task</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>


                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->nickname}}</td>
                        <td>{{$user->gender}}</td>
                        <td><img class="img-circle" width="40px" height="40px" src="/storage/{{$user->image}}"></td>
                        <td>{{$user->email}}</td>
                        <td>ProjectManager</td>
                        <td>Backend</td>
                        <td>  <span @if($user->is_active == true) class="label label-success" @endif @if($user->is_active == false) class="label label-danger" @endif >
                                        @if($user->is_active == true) InActive @endif
                                @if($user->is_active == false) banded @endif
                                      </span>
                        </td>

                    </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <a href="{{route('user.index')}}" class="btn btn-sm btn-success  pull-left"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            {{--<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All User</a>--}}
        </div>
        <!-- /.box-footer -->
    </div>

@endsection