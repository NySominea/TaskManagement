
@extends('layouts.master')

@section('content')

    <div class="box box-info box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">User Info</h3>
            @if(Auth::user()->id==$user->id)
                <div class="box-tools pull-right">
                    <a href="/user/update/{{$user->id}}" class="btn btn-box-tool" role="button" data-toggle="tooltip" title="Edit"><i class="fa fa-edit" ></i></a>
                    {{--<button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o" ></i></button>--}}
                </div>
            @endif

        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table no-border ">
                <tbody class="no-padding">
                <tr>
                    <td width="25%"><label>Name</label></td>
                    <td width="20px"><label>:</label></td>
                    <td><span><label>{{$user->name}}</label></span></td>
                </tr>
                <tr>
                    <td width="50px"><label>NicName</label></td>
                    <td width="50px"><label>:</label></td>
                    <td><label>{{$user->nickname}}</label></td>
                </tr>
                <tr>
                    <td width="50px"><label>Gender</label></td>
                    <td width="50px"><label>:</label></td>
                    <td><label>@if($user->gender==1) Male @else Female @endif</label></td>
                </tr>
                <tr>
                    <td width="50px">
                        <label>Contact &emsp;</label>
                    </td>
                    <td width="50px">
                        <label> :&emsp;</label>
                    </td>
                    <td>
                        <label>{{$user->email}}</label>
                    </td>
                </tr>
                <tr>
                    <td width="50px"><label>Work in project</label></td>
                    <td width="50px"><label>:</label></td>
                    <td>
                         @foreach($project as $project)
                            <label>
                                <u>{{$project->name}} </u>
                                &emsp; Start:{{$project->start_date}}
                                &emsp; End:{{$project->end_date}}
                            </label>&emsp;
                          @endforeach
                    </td>
                </tr>
                <tr>
                    <td width="50px">
                        <label>Position</label>
                    </td>
                    <td width="50px">
                        <label>:&emsp;</label>
                    </td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->

        <!--Footer-->
        <div class="box-footer">
            <div class="box-footer clearfix">
                <a href="{{route('user.index')}}" class="btn btn-sm btn-info  pull-left" data-toggle="tooltip" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                {{--<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All User</a>--}}
            </div>
        </div>
        <!--end.Footer-->

    </div>
    <!--end.box-->
@endsection

@section('scripts')
    {!! Html::script('js/customjs/project_preview.js') !!}
@endsection