@extends('templates.default')

@section('content')
    
    @include('common.error')
    
    {{Form::open( ['route'=>'validate'])}}
        {{Form::text('username')}}
        {{Form::password('password')}}
        {{Form::submit('Log in')}}
    {{Form::close()}}
@stop
