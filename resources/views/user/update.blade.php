@extends('layouts.master')
@section('content')

    {{--<div class="box box-info">--}}
        {{--<form role="form"  action="/user/{{$user->id}}" method="post" enctype="multipart/form-data">--}}
        {{--{{method_field('put')}}--}}
        {{--{{csrf_field()}}--}}

        {{--<!-- header create new user -->--}}
            {{--<div class="box-header with-border">--}}
                {{--<h3 class="box-title">Update User-info</h3>--}}
            {{--</div>--}}

            {{--<!-- body for input and submit -->--}}
            {{--<div class="row">--}}
                {{--<div class="box-body">--}}

                    {{--<div class="col-md-6">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="username">Username</label>--}}
                            {{--<input type="text" name='name' class="form-control" id="username" placeholder="username" value="{{$user->name}}">--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-6">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="username">Nickname</label>--}}
                            {{--<input type="text" name='nickname' class="form-control" id="nickname" placeholder="nickname" value="{{$user->nickname}}">--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row">--}}
                {{--<div class="box-body">--}}

                    {{--<div class="col-md-6">--}}
                        {{--<div class="form-group">--}}
                            {{--<label>Gender</label>--}}
                            {{--<div class="radio">--}}
                                {{--<label><input type="radio" name="gender" value=1 @if($user->gender==1) checked @endif >male</label>--}}
                                {{--<label>&nbsp;</label>--}}
                                {{--<label><input type="radio" name="gender" value=0 @if($user->gender==0) checked @endif >female</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-6">--}}
                        {{--<div class="form-group">--}}
                            {{--<div style="position:relative;">--}}
                                {{--<a class='btn btn-primary' href='javascript:;'>--}}
                                    {{--Choose Image...--}}
                                    {{--<input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="image" size="40"  onchange='$("#upload-file-info").html($(this).val());'>--}}
                                {{--</a>--}}
                                {{--<span class='label label-info' id="upload-file-info"></span>--}}
                            {{--</div>--}}
                            {{--dsldlljsd--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row">--}}
                {{--<div class="box-body">--}}

                    {{--<div class="col-md-6">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="email">Email</label>--}}
                            {{--<div class="input-group">--}}
                                {{--<span class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>--}}
                                {{--<input id="email" type="text" class="form-control" name="email" placeholder="email" value="{{$user->email}}">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-6">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="password">Password</label>--}}
                            {{--<div class="input-group">--}}
                                {{--<span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>--}}
                                {{--<input id="email" type="password" class="form-control" name="password" placeholder="password" value="{{$user->password}}">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row">--}}

                {{--<div class="col-md-12">--}}
                    {{--<div class="box-footer">--}}
                        {{--<button type="submit" class="btn btn-info pull-right" >Update</button>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}

        {{--</form>--}}
    {{--</div>--}}

    <div class="box box-success">
        {!! Form::model($user,['url' => '/user/'.$user->id,'method' => 'PATCH','files' => true]) !!}
        {{--<form role="form"  action="/user/{{$user->id}}" method="post" enctype="multipart/form-data">--}}
        {{--{{method_field('put')}}--}}
        {{--{{csrf_field()}}--}}
            @include('user.form')
        {{--</form>--}}
        {!! Form::close() !!}
    </div>

    {{--<script>--}}
        {{--document.getElementById("files").onchange = function () {--}}
            {{--var reader = new FileReader();--}}

            {{--reader.onload = function (e) {--}}
                {{--// get loaded data and render thumbnail.--}}
                {{--document.getElementById("image").src = e.target.result;--}}
            {{--};--}}

            {{--// read the image file as a data URL.--}}
            {{--reader.readAsDataURL(this.files[0]);--}}
        {{--};--}}
    {{--</script>--}}

@endsection
@section('scripts')
    {!! Html::script('js/customjs1/user-update.js') !!}
@endsection