@extends('templates.default')

@section('content')
    <h1>{{$item->title}}</h1>
    <p>{{$item->content}}</p>
@stop