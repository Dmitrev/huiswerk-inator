@extends('templates.admin')

@section('content')
  <h1>Melding bekijken</h1>
  <div class="form-group">
    {{Form::label('title', 'Titel: ')}}
    <p class="form-control-static">{{{$announcement->title}}}</p>
  </div>

  <div class="form-group">
    {{Form::label('message', 'Bericht: ')}}
    <p class="form-control-static">{{{$announcement->message}}}</p>
  </div>

  <div class="form-group">
    {{Form::label('start_date', 'Staat: ')}}
    <p class="form-control-static">{{{ ($announcement->state == 1) ? 'aan' : 'uit'}}}</p>
  </div>


  <div class="form-group">
    <a href="{{URL::route('admin-announcement.edit', [$announcement->id])}}" class="btn btn-default"><i class="fa fa-pencil"></i> bewerken</a>
    <a href="{{URL::route('admin-announcement.confirm-delete', [$announcement->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i> verwijderen</a>
  </div>
@stop
