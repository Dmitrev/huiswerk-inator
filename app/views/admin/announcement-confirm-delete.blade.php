@extends('templates.default')

@section('content')
  <h1>Bevestig verwijdering</h1>
  <p>Weet je zeker dat je de melding <strong>{{$announcement->title}}</strong> witlt verwijderen?</p>

  {{Form::open(['route' => 'admin-announcement.delete'])}}
  <input type="hidden" name="id" value="{{$announcement->id}}">

  <div class="form-group">

    {{Form::submit('Ja', ['class' => 'btn btn-danger'])}}

    <a class="btn btn-default" href="{{URL::route('admin-announcement.show', [$announcement->id])}}">
      Nee
    </a>
  </div>

  {{Form::close()}}
@stop
