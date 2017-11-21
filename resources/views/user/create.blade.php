@extends('layouts.master')
@section('content')

   <div class="box box-primary">
      {!! Form::open(['url' => '/user','role' => 'form','method' => 'post','files' => true]) !!}
      {{--<form role="form"  action="/user" method="post" enctype="multipart/form-data">--}}

         @include('user.form')
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
   {!! Html::script('js/customjs1/user-create.js') !!}
@endsection