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
    {{Form::label('start_date', 'Startdatum: ')}}
    {{Form::text('start_date', null, [
    'class' => 'datepicker form-control',
    'data-value' => Input::old('start_date', $announcement->start_date)
    ])}}
  </div>

  <div class="form-group">
    {{Form::label('end_date', 'Einddatum: ')}}
    {{Form::text('end_date', null, [
    'class' => 'datepicker form-control',
    'data-value' => Input::old('end_date', $announcement->end_date)
    ])}}
  </div>

  <div class="form-group">
      <div class="row">
          <div class="col-md-4">
              {{Form::label('force', 'Forceer')}}
              <p>{{Form::checkbox('force', 1, Input::old('force', $announcement->force),  ['class' => 'control-label'])}}</p>
          </div>

          <div class="col-md-8">
              {{Form::label('state', 'staat')}}
              {{Form::select('state', [
                0 => 'uit',
                1 => 'aan'
              ],
              Input::old('state', $announcement->state),
              ['class' => 'form-control'] )}}
          </div>

      </div>

  <div class="form-group">
    {{Form::submit('opslaan', ['class' => 'btn btn-primary'])}}
  </div>
@stop
