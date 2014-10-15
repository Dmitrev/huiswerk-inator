@extends('templates.admin')

@section('content')
  <h1>Bevestig verwijdering account</h1>

  <p>
    Weet je zeker dat je het account <strong>{{$user->username}}</strong> van
    gebruiker <strong>{{$user->fullname}}</strong> wilt verwijderen?
  </p>

  {{Form::open(['route' => 'admin-users.delete'])}}
  <input type="hidden" name="user_id" value="{{$user->id}}">

  <div class="form-group">

    {{Form::submit('Ja', ['class' => 'btn btn-danger'])}}

    <a class="btn btn-default" href="{{URL::route('admin-users.show', [$user->id])}}">
      Nee
    </a>
  </div>

  {{Form::close()}}

@stop
