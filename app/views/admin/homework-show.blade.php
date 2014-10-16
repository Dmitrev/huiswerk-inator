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

  <p>
    <a href="{{URL::route('admin-homework.edit', [$homework->id])}}" class="btn btn-default">Bewerken</a>
  </p>
@stop
