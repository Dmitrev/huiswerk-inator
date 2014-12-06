@extends('templates.default')

@section('content')
  <h1>Huiswerk verwijderen</h1>
  <p>Weet je zeker dat je het item <strong>{{{$homework->title}}}</strong> wilt verwijderen?</p>
  {{Form::open(['route' => ['destroy-homework', $homework->id], 'method' => 'DELETE'])}}
    {{Form::button( 'Ja', ['class' => 'btn btn-danger', 'type' => 'submit'] )}}
    <a href="{{URL::route('homework', [$homework->id])}}" class="btn btn-default">Nee</a>
  {{Form::close()}}
@stop
