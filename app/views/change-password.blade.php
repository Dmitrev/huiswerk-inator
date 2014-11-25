@extends('templates.login')

@section('content')
  <h1>Nieuw wachtwoord kiezen</h1>
  @include('common.error')
  {{Form::open(['route' => 'submit-change-password'])}}
    {{Form::hidden('recovery_id', $user->id)}}
    {{Form::hidden('secret_answer', $user->secret_answer)}}
    <div class="form-group">
      {{Form::label('password', 'Nieuw wachtwoord: ')}}
      {{Form::password('password',['class' => 'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('password_confirmation', 'Nieuw wachtwoord herhalen: ')}}
      {{Form::password('password_confirmation', ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
      {{Form::submit('Wachtwoord veranderen', ['class' => 'btn btn-primary'])}}
    </div>
  {{Form::close()}}
@stop
