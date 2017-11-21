@extends('layouts.master')

@section('content')
            <div class="box box-primary">
                {{--box-header--}}
                <div class="box-header">
                    <h3 class="box-title">All Projects</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->

                {{--box-body--}}
                <div class="box-body table-responsive no-padding" id="#project_list">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>End Date</th>
                            <th>Days Remain</th>
                            <th>Progress</th>
                            <th>Manager</th>
                            <th>Members</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($projects as $project)
                            <tr class="project">
                                <td>No</td>
                                <td>{{$project->name}}</td>
                                <td>{{$project->description}}</td>
                                <td>{{$project->end_date}}</td>
                                <td>{{$day_remain[$project->id]}}</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar" style="width:{{$progress_percent[$project->id]}}%"></div>
                                    </div>
                                </td>
                                <td><img src="\img\{{$managers[$project->id]->image}}" style="width: 25px;height:25px" class="img-circle img-responsive" alt="{{\App\User::find($project->user_id)->name}}"></td>
                                <td>
                                    @for($i=0;$i<count(($developers[$project->id]));$i++)
                                        <img src="\img\{{$developers[$project->id][$i]->image}}" style=" display: inline;width: 25px;height:25px" class="img-circle img-responsive" alt="{{$developers[$project->id][$i]->name}}">

                                    @endfor
                                </td>
                                {!! Form::open(['class' => 'project_preview', 'method' => 'GET', 'route' => ['project.show',$project->id]]) !!}
                                {!! Form::close() !!}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
@endsection

@section('scripts')
    {!! Html::script('js/customjs/project-display.js') !!}
@endsection