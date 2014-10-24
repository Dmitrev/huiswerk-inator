@extends('templates.admin')

@section('content')
  <h1>Nieuwe melding plaatsen</h1>
  @include('common.error')
  {{Form::open(['route' => 'admin-announcement.create'])}}
    <div class="form-group">
        {{Form::label('title', 'Titel: ')}}
        {{Form::text('title', Input::old('title'), ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('message', 'Bericht: ')}}
        {{Form::textarea('message', Input::old('message'), ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
      {{Form::label('start_date', 'Begin datum: ')}}
      {{Form::text('start_date', Input::old('start_date'), [
        'class' => 'form-control datepicker',
        'placeholder' => 'Kies de begindatum hier'
      ])}}
    </div>

    <div class="form-group">
      {{Form::label('end_date', 'Begin datum: ')}}
      {{Form::text('end_date', Input::old('end_date'), [
        'class' => 'form-control datepicker',
        'placeholder' => 'Kies de einddatum hier'
      ])}}
    </div>

    <div class="form-group">
      {{Form::submit('Plaatsen', ['class' => 'btn btn-primary'])}}
    </div>
  {{Form::close()}}

@stop

@section('js')
  @include('common.datepicker-enable-all')
@stop
