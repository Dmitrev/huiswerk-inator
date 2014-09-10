@extends('templates.default')

@section('content')
    {{Form::open( ['route'=>'validate'])}}
        {{Form::text('username')}}
        {{Form::password('password')}}
        {{Form::submit('Log in')}}
    {{Form::close()}}
@stop
