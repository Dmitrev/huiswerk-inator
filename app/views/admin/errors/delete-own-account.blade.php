@extends('templates.admin')

@section('content')
  <h1>Error: </h1>
  <p>Je kan niet je eigen account verwijderen!</p>
  <p>
    <a href="{{URL::route('admin-users.view')}}" class="btn btn-default">
      Terug naar gebruikers overzicht
    </a>
  </p>
@stop
