@extends('templates.default')

@section('content')
  @include('common.error')
  <h1>Beveiligingsvraag</h1>
  @include('common.error')
  {{Form::open(['route' => 'submit-secret-question'])}}
  <div class="form-group">
    {{Form::hidden('user_id', $user->id)}}
    <p>{{{$user->secret_question}}}</p>
    {{Form::label('answer', 'Antwoord:')}}
    {{Form::password('answer', ['class' => 'form-control'])}}
  </div>

  <div class="form-group">
    {{Form::submit('Antwoorden', ['class' => 'btn btn-primary'])}}
    <a href="{{URL::route('login')}}" class="btn btn-default">Terug naar login</a>
  </div>
  {{Form::close()}}
@stop
