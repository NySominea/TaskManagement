@extends('layouts.master')

@section('content')
    {!! Form::open(['role'=>'form','route'=>'project.store','method'=>'POSt']) !!}
        @include('projects.form')
    {!! Form::close() !!}
@endsection

@section('scripts')
    {!! Html::script('js/customjs/project-create.js') !!}
@endsection