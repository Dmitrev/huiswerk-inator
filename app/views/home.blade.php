@extends('templates.default')

@section('content')
    <p>Ingelogd als {{ Auth::user()->fullname }}, <a href="{{URL::route('logout') }}">uitloggen</a></p>
    
    @if( Session::has('success'))
        <p>{{Session::get('success')}}</p>
    @endif
    <h1>Homework</h1>
    <a href="{{URL::route('add-homework')}}">Huiswerk toevoegen</a>
    @foreach( $homework as $item )
        <p><a href="{{URL::route('homework', [$item->id])}}">{{{$item->title}}}</a> ({{{$item->subject->name}}}) Deadline: {{$item->deadline}}</p>
    @endforeach
    
    {{$homework->links('pagination::simple')}}
@stop


