@extends('templates.default')

@section('content')
    <p><a href="{{URL::route('home')}}">Terug naar overzicht</a></p>
    <h1>{{$item->title}}</h1>
    <p>{{$item->content}}</p>
@stop