@extends('layouts.master')

@section('content')
    {!! Form::model($project,['route' => ['project.update',$project->id],'method' => 'PATCH']) !!}
        @include('projects.form')
    {!! Form::close() !!}
@endsection

@section('scripts')
    {!! Html::script('js/customjs/project-create.js') !!}
    {!! Html::script('js/customjs/project_update.js') !!}
@endsection