<!-- header create new user -->
<div class="box-header with-border">
    <h3 class="box-title">Create New User</h3>
</div>

<!-- body for input and submit -->
<div class="row">
    <div class="box-body">

        <div class="col-md-8">

            <div class="form-group">
                {!! Form::label('username','Username',[]) !!}
                {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'username']) !!}
                <span>{{$errors->first('name')}}</span>
            </div>

            <div class="form-group">
                <label for="username">Nickname</label>
                <input type="text" name='nickname' class="form-control" id="nickname" value="{{isset($user)?$user->nickname:''}}" placeholder="nickname">
            </div>

            <div class="form-group">
                <label>Gender</label>
                <div class="radio">
                    <label><input type="radio" name="gender" value="1" {{isset($user) && $user->gender?'checked':''}}>male</label>
                    <labl>&nbsp;</labl>
                    <label><input type="radio" name="gender" value="0" {{isset($user) && !$user->gender?'checked':''}}>female</label>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                    <input id="email" type="text" class="form-control" name="email" value="{{isset($user)?$user->email:''}}" placeholder="email">
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <input id="email" type="password" class="form-control" name="password" value="{{isset($user)?$user->password:''}}" placeholder="password">
                </div>
            </div>

        </div>

        <div class="col-md-4">

            {{--<img id="image" src="{{file_exists($file->name)?:'/storage/$user->image'}}">--}}

            <img id="image" class="img-circle" style="border-radius: 9px" src="{{isset($user)?Storage::url($user->image):'/storage/img/kohrong1.jpg'}}" width="100%" height="75%">
            {{--<img src="{{$file_exists($file->name)?:'/path/to/default.png'}}">--}}
            {{--<img id="image" src="{{file_exists($file->name)?:'/storage/$user->image'}}">--}}

            <div class="form-group" data-width="100%">
                <br>
                <div style="position:relative;width:100%; text-align: center">
                    <a class='btn btn-success' href='javascript:;'>
                        Choose Image...
                        <input  id='files' type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="image" size="40"  onchange='$("#upload-file-info").html($(this).val());' >
                    </a>
                    <span class='label label-info' id="upload-file-info"></span>
                </div>
            </div>
        </div>


    </div>
</div>


<div class="row">

    <div class="col-md-12">
        <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right">{{isset($user)?'Update':'Create'}}</button>
        </div>
    </div>
</div>
