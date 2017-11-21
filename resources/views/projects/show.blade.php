@extends('layouts.master')

@section('content')
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">{{$project->name}}</h3>
                <div class="box-tools pull-right">
                    <a  href="{{route('project.edit',$project->id)}}" ><button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Edit"><i class="fa fa-edit" ></i></button></a>
                    @if(Auth::user()->id==$manager->id)
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o" ></i></button>
                    @endif
                </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table no-border ">
                <tbody class="no-padding">
                    <tr>
                        <td width="25%"><label>Project manager</label></td>
                        <td width="20px"><label>:</label></td>
                        <td><span><a href="{{route('user.show',$manager->id)}}"><label style="cursor: pointer">{{$manager->name}}</label></a></span></td>
                    </tr>
                    <tr>
                        <td width="50px"><label>Project Description</label></td>
                        <td width="50px"><label>:</label></td>
                        <td><label>{{$project->description}}</label></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Start Date &emsp;:&emsp;</label>
                            <label>{{$project->start_date}}</label>
                        </td>
                        <td>
                            <label>End Date &emsp;:&emsp;</label>
                            <label>{{$project->end_date}}</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="50px"><label>Project Developers</label></td>
                        <td width="50px"><label>:</label></td>
                        <td>
                            @foreach($developers as $developer)
                            <a href="{{route('user.show',$developer->id)}}"><label style="cursor: pointer">
                                {{$developer->name}}
                            </label></a>&emsp;
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
            </table>
            <hr>
            <label style="padding: 8px">Project Modules</label>
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped module" >
                    <tbody>
                    <tr>
                        <th>Module_ID</th>
                        <th>Name</th>
                        <th>Priority</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Progress</th>
                        <th>Developers</th>
                    </tr>
                    @foreach($modules as $module)
                        <tr class="module_row">
                            <td>{{$module->id}}</td>
                            <td>{{$module->name}}</td>
                            <td><span class="label {{$module_priority_color[$module->priority]}}">{{$module_priority[$module->priority]}}</span></td>
                            <td>{{$module->start_date}}</td>
                            <td>{{$module->end_date}}</td>
                            <td><div class="progress progress-xs">
                                    <div class="progress-bar" style="width:{{$module_progress_percent[$module->id]}}% "></div>
                                </div></td>
                            <td>
                                @for($i=0;$i<count(array_unique($module_developers[$module->id]));$i++)
                                    <img src="\img\{{$module_developers[$module->id][$i]->image}}" style=" display: inline;width: 25px;height:25px" class="img-circle img-responsive" alt="{{\App\User::find($project->user_id)->name}}">
                                @endfor
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <hr>
            <label style="padding: 8px">Module Tasks</label>
            <div class="box-body table-responsive no-padding">
                <table class="table ">
                    <tbody><tr style="background-color: #f4f4f4">
                        <th>Module_Name</th>
                        <th>Task_ID</th>
                        <th>Task_Name</th>
                        <th>Developed By</th>
                        <th>Status</th>
                    </tr>
                    @foreach($modules as $module)
                        <tr>
                            <td rowspan="{{count($alltasks[$module->id])}}">{{$module->name}}</td>

                            @for($i=0;$i<count($alltasks[$module->id]);$i++)
                                    <td>{{$alltasks[$module->id][$i]->id}}</td>
                                    <td>{{$alltasks[$module->id][$i]->name}}</td>
                                    <td>
                                        <img src="\img\{{$alltasks[$module->id][$i]->user->image}}" style=" display: inline;width: 25px;height:25px" class="img-circle img-responsive" alt="{{\App\User::find($project->user_id)->name}}">
                                    </td>
                                    <td><span class="label {{$task_status_color[$alltasks[$module->id][$i]->status]}} task_status" value="1">{{$task_status[$alltasks[$module->id][$i]->status]}}</span></td>
                                </tr>
                            @endfor

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection

@section('scripts')
    {!! Html::script('js/customjs/project_preview.js') !!}
@endsection