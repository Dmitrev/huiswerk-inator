@extends('templates.admin')

@section('content')
  @include('common.back-admin-view-user')
  <a @if( $user->id === Auth::user()->id ) disabled @endif href="{{URL::route('admin-users.confirm-delete', [$user->id])}}" class="btn btn-danger">
    Verwijderen
  </a>
  <h1>Gebruiker {{$user->username}} aanpassen</h1>

  @include('common.error')

  {{Form::open(['route' => 'admin-users.save'])}}
  <input type="hidden" name="id" value="{{$user->id}}">
  <div class="form-group">
    {{Form::label('fullname', 'Naam: ')}}
    {{Form::text('fullname', Input::old('fullname', $user->fullname), ['class' => 'form-control'])}}
  </div>

  <div class="form-group">
    {{Form::label('group', 'Groep: ')}}
    {{Form::select('group', $groups, Input::old('group', $user->group), ['class' => 'form-control'])}}
  </div>

  <div class="form-group">
    {{Form::label('username', 'Gebruikersnaam: ')}}
    <p class="form-control-static">{{{$user->username}}}</p>
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
