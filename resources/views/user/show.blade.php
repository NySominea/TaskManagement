@extends('layouts.master')
@section('content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">ListView User</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                {{--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body ">
            <div class="table-responsive ">
                <table class="table no-margin table-hover">
                    <tr>
                        <th>Creat ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Status</th>
                        {{--<th>Control</th>--}}
                    </tr>
                    <tbody>

                    @foreach(\App\User::all() as $user)
                            <tr  onclick="location.href='/user/{{$user->id}}'">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>@if($user->gender==1) Male @else Female @endif</td>
                                <td><img class="img-circle" width="40px" height="40px" src="/storage/{{$user->image}}"></td>
                                <td>{{$user->email}}</td>
                                <td>  <span @if($user->is_active == true) class="label label-success" @endif @if($user->is_active == false) class="label label-danger" @endif >
                                        @if($user->is_active == true) Active @endif
                                        @if($user->is_active == false) InActive @endif
                                      </span>
                                </td>
                                {{--<td>--}}
                                    {{--<a href="/user/update/{{$user->id}}" class="label label-info" role="button">Update</a>--}}
                                    {{--<a href="/user/delete/{{$user->id}}" class="label label-warning" role="button">Delete</a>--}}
                                {{--</td>--}}

                            </tr>
                   @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <a href="{{route('user.create')}}" class="btn btn-sm btn-info  pull-left">Add more</a>
            {{--<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All User</a>--}}
        </div>
        <!-- /.box-footer -->
    </div>
@endsection