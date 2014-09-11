@extends('templates.default')

@section('content')
    {{Form::open(['route' => 'create-homework'])}}
        <div>{{Form::text('title', null, ['placeholder' => 'title'])}}</div>
        <div>{{Form::select('subject_id', $subjects)}}</div>    
            
        <div>{{Form::textarea('content', null, ['placeholder' => 'content'])}}</div>
        
        <p>{{Form::submit('huiswerk toevoegen')}}</p>
    {{Form::close()}}
@stop