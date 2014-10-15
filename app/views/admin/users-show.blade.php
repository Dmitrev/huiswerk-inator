@extends('templates.admin')

@section('content')
  @include('common.back-admin-users')

  <dl>
    <dt>Naam: </dt>
    <dd>{{$user->fullname}}</dd>
    <dt>Gebruikersnaam: </dt>
    <dd>{{$user->username}}</dd>
    <dt>Groep: </dt>
    <dd>{{$user->userGroup->getName()}}</dd>
  </dl>

  <p>
    <a href="{{URL::route('admin-users.edit', [$user->id])}}" class="btn btn-default">
      Bewerken
    </a>
  </p>
@stop
