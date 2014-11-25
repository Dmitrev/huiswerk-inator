@extends('templates.admin')

@section('content')
  <h1>Bevestig verwijdering</h1>
  <p>Weet je zeker dat je het item <strong>{{{$homework->title}}}</strong> witlt verwijderen?</p>

  {{Form::open(['route' => 'admin-homework.delete'])}}
  <input type="hidden" name="homework_id" value="{{$homework->id}}">

  <div class="form-group">

    {{Form::submit('Ja', ['class' => 'btn btn-danger'])}}

    <a class="btn btn-default" href="{{URL::route('admin-homework.show', [$homework->id])}}">
      Nee
    </a>
  </div>

  {{Form::close()}}
@stop
