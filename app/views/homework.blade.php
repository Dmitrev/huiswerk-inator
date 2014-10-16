@extends('templates.default')

@section('content')
    @include('common.back')
    <h1>{{$item->title}}</h1>
    <ul class="list-inline">
        <li><span class="label label-info">{{$item->subject->name}}</span></li>
        <li><span class="label label-danger">{{$item->deadline_friendly}}</span></li>
    </ul>
    <h2>Beschrijving</h2>
    <p>{{$item->content}}</p>

    @include('common.comments')
@stop
