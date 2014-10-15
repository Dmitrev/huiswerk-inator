@extends('templates.admin')

@section('content')
  <h1>Alle gebruikers</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Naam</th>
        <th>Gebruikersnaam</th>
        <th>Groep</th>
      </tr>
    </thead>
    <tbody>
  @foreach( $users as $user)
      <tr>
        <td>{{$user->fullname}}</td>
        <td>{{$user->username}}</td>
        <td>{{$user->userGroup->getName()}}</td>
      </tr>
  @endforeach
    </tbody>
  </table>

  {{$users->links()}}
@stop
