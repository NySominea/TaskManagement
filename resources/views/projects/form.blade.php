<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    {{--Create New Project--}}
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="box-header with-border">
            <h3 class="box-title">Create New Project</h3>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('title','Project Title') !!}
                        {!! Form::text('project_title',isset($project)?$project->name:null,['class' => 'form-control','placeholder' => 'Project Title']) !!}
                        @if($errors) {{$errors->first()}} @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('description',"Project Description") !!}
                        {!! Form::textarea('project_desc',isset($project)?$project->description:null,['rows' => 7,'class' => 'form-control','placeholder' => 'Description...']) !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('startdate','Start Date') !!}
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {!! Form::text('project_startdate',isset($project)?$project->start_date:null,['class' => 'form-control pull-right datepicker']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('enddate','End Date') !!}
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {!! Form::text('project_enddate',isset($project)?$project->end_date:null,['class' => 'form-control pull-right datepicker']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('members','Add Members to Project') !!}
                        <select id="select_member" name="project_member[]" class="js-example-responsive select2 form-control" multiple="multiple" style="width: 100%" data-placeholder="Select or Search for members">
                            @if(!isset($project))
                                <option disabled value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                            @endif
                            @foreach($users as $key => $value)
                                        @if(Auth::user()->id!=$key)
                                            <option value="{{$key}}"
                                                @if(isset($project))
                                                    @foreach($project_users as $user)
                                                        {{$key==$user->id?'selected':''}}
                                                    @endforeach
                                                @endif
                                                >{{$value}}</option>
                                        @else
                                            @if(isset($project))
                                                <option disabled value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                                            @endif
                                        @endif
                            @endforeach
                        </select>
                    </div>

                    <div  id="member_image_panel">
                        @if(isset($project))
                            @foreach($project_users as $user)
                                <img src="/img/{{Auth::user()->id!=$user->id?$user->image:''}}" class="img-responsive img-circle pull-left" width="40px"/>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="box-header">
            <h3 class="box-title">Project Module(s)</h3>
        </div>

        <div class="row">
            <div class="box-body">
                <div class="col-md-12" id="div_module">
                    @if(isset($project) && isset($modules))
                        @foreach($modules as $module)
                            <div class="box box-solid box-module" >
                                <div class="box-header with-border">
                                    <h3 class="box-title">
                                        {!! Form::text('module[][name]',$module->name,['class' => 'module-name', 'readonly' => 'readonly' ]) !!}
                                    </h3>
                                    <button type="button" class="btn btn-box-tool module-edit"><i class="fa fa-edit"></i></button>
                                    <div class="pull-right">
                                        <select class="priority" data-value="0" name="module[][priority]" style="vertical-align: middle ;margin-right: 20px; color:#3c8dbc">
                                            <option selected disabled value="4">Select Priority</option>
                                            <option value="1" {{$module->priority==1?'selected':''}}>Important</option>
                                            <option value="2" {{$module->priority==2?'selected':''}}>Less important</option>
                                            <option value="3" {{$module->priority==3?'selected':''}}>Not important</option>
                                            </select>
                                        <button type="button" class="btn btn-box-tool collapse-button"><i class="fa fa-minus"></i></button>
                                        <button type="button" class="btn btn-box-tool remove-module"><span><i class="fa fa-times"></i></span></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-group col-md-6">
                                        {!! Form::label('startdate','Start Date') !!}
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            {!! Form::text('module[][startdate]',$module->start_date,['class' => 'form-control pull-right date startdate']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('enddate','End Date') !!}
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            {!! Form::text('module[][enddate]',$module->end_date,['class' => 'form-control pull-right date enddate']) !!}
                                        </div>
                                    </div>
                                    <div class="box-header">
                                        <h3 class="box-title">Module Task(s)</h3>
                                    </div>
                                    <div class="row div-task box-body" id="#div_task">
                                        @if(isset($tasks[$module->id]))
                                            @foreach($tasks[$module->id] as $task)
                                                <div class="col-sm-12">
                                                    <div class="box box-primary box-solid box-task">
                                                        <div class="box-header with-border">
                                                            <h3 class="box-title">
                                                                {!! Form::text('task[module_name][][name]',$task->name,['class' => 'task-name', 'readonly' => 'readonly']) !!}
                                                            </h3>
                                                            <button type="button" class="btn btn-box-tool task-edit"><i class="fa fa-edit"></i></button>
                                                            <div class="box-tools pull-right">
                                                                <button type="button" class="btn btn-box-tool remove-task"><i class="fa fa-times"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="box-body">
                                                            <div class="form-group col-sm-5">
                                                                <label for="title">Add a developer to this task</label>
                                                                <select class="form-control task_member" name="task[module_name][][developer]" style="width: 100%;">
                                                                    <option value="" disabled>Select or Search for a developer</option>
                                                                    @foreach($project_users as $user)
                                                                        <option value="{{$user->id}}" {{$user->id==$task->user_id?'selected':''}}>{{$user->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-2 col-sm-offset-1 text-center">
                                                                <div class="developer_image_panel">
                                                                    @foreach($project_users as $user)
                                                                        <img src="/img/{{$task->user_id==$user->id?$user->image:''}}" class="img-responsive img-rounded" width="60px" height="60px"/>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label for="task_status">Status</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="form-group col-md-12">
                                        <button class="btn btn-primary btn-add-task" type="button" id="btn_add_task">Add Task</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-md-12" id="div_button_add_module">
                    <button type="button" id="add_module" class="btn btn-success">Add Module</button>
                </div>
            </div>
        </div>

        <!-- /.box-body -->

        {{--Button Create Project--}}
        <div class="row">
            <div class="col-md-12">
                <div class="box-footer">
                    {!! Form::submit('Create New Project',['id' => 'btn_create', 'class' => 'btn btn-primary pull-right']) !!}
                </div>
            </div>

        </div>

</div>