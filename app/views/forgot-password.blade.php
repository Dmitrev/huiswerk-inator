@extends('templates.default')

@section('content')
  <h1>Wachtwoord herstellen</h1>
  <p>
    Om je wachtwoord te herstellen, moet als allereerst je gebruikersnaam
    invullen in het veld hieronder
  </p>
  @include('common.error')
  {{Form::open()}}
    <div class="form-group">
      {{Form::label('username', 'Gebruikersnaam: ')}}
      {{Form::text('username', Input::old('username'), ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
      {{Form::submit('Volgende stap', ['class' => 'btn btn-primary'])}}
      <a href="{{URL::route('login')}}" class="btn btn-default">Terug naar login</a>
    </div>
  {{Form::close()}}
@stop
