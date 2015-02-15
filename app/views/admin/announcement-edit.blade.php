@extends('templates.admin')

@section('content')
  <h1>Melding bekijken</h1>
  @include('common.error')
  {{Form::open(['route' => 'admin-announcement.update'])}}
  {{Form::hidden('id', $announcement->id)}}
  <div class="form-group">
    {{Form::label('title', 'Titel: ')}}
    {{Form::text('title', Input::old('title', $announcement->title), ['class' => 'form-control'])}}</p>
  </div>

  <div class="form-group">
    {{Form::label('message', 'Bericht: ')}}
    {{Form::textarea('message', Input::old('message', $announcement->message), ['class' => 'form-control'])}}
  </div>


  <div class="form-group">

              {{Form::label('state', 'staat')}}
              {{Form::select('state', [
                0 => 'uit',
                1 => 'aan'
              ],
              Input::old('state', $announcement->state),
              ['class' => 'form-control'] )}}

</div>
  <div class="form-group">
    {{Form::submit('opslaan', ['class' => 'btn btn-primary'])}}
  </div>
@stop
