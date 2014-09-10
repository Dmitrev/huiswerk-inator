@extends('templates.default')

@section('content')
    <p>Ingelogd als {{ Auth::user()->fullname }}, <a href="{{URL::route('logout') }}">uitloggen</a></p>
        
    <h1>Homework</h1>
    
    @foreach( $homework as $item )
        <p>{{{$item->title}}} ({{{$item->subject->name}}}) Deadline: {{$item->deadline}}</p>
    @endforeach
@stop


