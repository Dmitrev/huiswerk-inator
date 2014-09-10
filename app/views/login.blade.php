@extends('templates.default')

@section('content')
    
    @if( Session::has('error') )
        <p>{{ Session::get('error') }}</p>
    @endif
    
    {{Form::open( ['route'=>'validate'])}}
        {{Form::text('username')}}
        {{Form::password('password')}}
        {{Form::submit('Log in')}}
    {{Form::close()}}
@stop
