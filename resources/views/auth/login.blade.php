@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <strong>Login</strong>
                    <div class="pull-right">
                        <a style="color: mediumblue;text-decoration: none;" href="{{route('password.request')}}">Forgot password?</a>
                    </div>
                </div>
                <div class="panel-body">

                    <form method="post" action="{{route('login')}}"> {{csrf_field()}}
                        {{--Email--}}
                        <div class="form-group" {{$errors->has('email')?'has-email':''}}>
                            <label for="email" class="control-label">Email Address</label>
                            <div class="input-group">
                                <input id='email' type='email'  class="form-control" name="email" value="{{old('email')}}" required autofocus/>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            </div>

                            @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        {{--Password--}}
                        <div class="form-group" {{$errors->has('password')?'has-password':''}}>
                            <label for="password" class="control-label">Password</label>
                            <div class="input-group">
                                <input id='password' type='password'  class="form-control" name="password" required/>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            </div>


                            @if ($errors->has('password'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        {{--Button Login--}}
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                Login
                                </button>
                            </div>
                            <hr style="background-color:#3097D1; height: 1px;">
                        </div>

                    </form>
                    <p class="pull-right" style="color:dimgrey">Don't have an account?
                        <a style="color: #3097D1;text-decoration: none;" href="{{route('register')}}">Sign Up Here!</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
