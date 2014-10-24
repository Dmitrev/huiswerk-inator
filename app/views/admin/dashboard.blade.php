@extends('templates.admin')

@section('content')
  <h1>Belangrijke meldingen</h1>
  <a href="{{URL::route('admin-anouncment.add')}}" class="btn btn-success"><i class="fa fa-plus"></i> Nieuwe melding</a>
@stop
