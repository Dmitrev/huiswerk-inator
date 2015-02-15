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
              {{Form::label('state', 'staat')}}
              {{Form::select('state', [
                0 => 'uit',
                1 => 'aan'
              ],
              Input::old('state', 1),
              ['class' => 'form-control'] )}}

  </div>

    <div class="form-group">
      {{Form::submit('Plaatsen', ['class' => 'btn btn-primary'])}}
    </div>
  {{Form::close()}}

@stop

@section('js')
  @include('common.datepicker-enable-all')
@stop
