@extends('templates.admin')

@section('content')
  <dl>
    <dt>Naam: </dt>
    <dd>{{$user->fullname}}</dd>
    <dt>Gebruikersnaam: </dt>
    <dd>{{$user->username}}</dd>
    <dt>Groep: </dt>
    <dd>{{$user->userGroup->getName()}}</dd>
  </dl>
@stop
