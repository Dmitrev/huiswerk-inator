@extends('templates.default')

@section('content')
    @include('common.error')
    
    {{Form::open(['route' => 'create-homework'])}}
        <div>{{Form::text('title', Input::old('title'), ['placeholder' => 'title'])}}</div>
        <div>{{Form::select('subject_id', $subjects, Input::old('subject_id') )}}</div>    
            
        <div>{{Form::textarea('content', Input::old('content'), ['placeholder' => 'content'])}}</div>
        <div>{{Form::text('deadline', Input::old('deadline'), ['placeholder' => 'deadline'])}}</div>
        <p>{{Form::submit('huiswerk toevoegen')}}</p>
    {{Form::close()}}
@stop