@extends('templates.admin')

@section('content')
  @include('common.back-admin-view-user')
  <h1>Gebruiker {{$user->username}} aanpassen</h1>

  @if( $errors->any() )
    @foreach($errors->all() as $error)
      <p>{{$error}}</p>
    @endforeach
  @endif

  {{Form::open(['route' => 'admin-users.save'])}}
  <input type="hidden" name="id" value="{{$user->id}}">
  <div class="form-group">
    {{Form::label('fullname', 'Naam: ')}}
    {{Form::text('fullname', Input::old('fullname', $user->fullname), ['class' => 'form-control'])}}
  </div>

  <div class="form-group">
    {{Form::label('username', 'Gebruikersnaam: ')}}
    <p class="form-control-static">{{$user->username}}</p>
  </div>

  <div class="form-group">
    {{Form::label('username', 'Nieuwe gebruikersnaam: ')}}
    {{Form::text('username', Input::old('username'), ['class' => 'form-control'])}}
  </div>

  <div class="form-group">
    {{Form::label('password', 'Nieuw wachtwoord: ')}}
    {{Form::password('password',  ['class' => 'form-control'])}}
  </div>

  <div class="form-group">
    {{Form::label('password_confirmation', 'Herhaal wachtwoord: ')}}
    {{Form::password('password_confirmation', ['class' => 'form-control'])}}
  </div>


  <div class="form-group">
    {{Form::button('<i class="fa fa-save"></i> Opslaan', [ 'type' => 'submit' , 'class' => 'btn btn-primary btn-block btn-lg'])}}
  </div>

  {{Form::close()}}
@stop
