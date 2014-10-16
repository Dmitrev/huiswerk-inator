@extends('templates.admin')

@section('content')
  <dl>
    <dt>Titel: </dt>
    <dd>{{$homework->title}}</dd>
    <dt>Vak: </dt>
    <dd>{{$homework->subject->name}}</dd>
    <dt>Deadline: </dt>
    <dd>{{$homework->deadline_friendly}}</dd>
  </dl>



@stop
