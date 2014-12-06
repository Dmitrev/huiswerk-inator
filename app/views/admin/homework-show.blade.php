@extends('templates.admin')

@section('content')
  <dl>
    <dt>Titel: </dt>
    <dd>{{{$homework->title}}}</dd>
    <dt>Vak: </dt>
    <dd>
      @if(is_object($homework->subject))
        {{{$homework->subject->name}}}
      @else
        <em>Verwijderd vak</em>
      @endif</dd>
    <dt>Deadline: </dt>
    <dd>{{{$homework->deadline_friendly}}}</dd>
  </dl>

  <p>
    <a href="{{URL::route('admin-homework.edit', [$homework->id])}}" class="btn btn-default">Bewerken</a>
    <a href="{{URL::route('admin-homework.confirm-delete', [$homework->id])}}" class="btn btn-danger">Verwijderen</a>
  </p>
@stop
