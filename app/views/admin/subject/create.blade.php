@extends('templates.admin')

@section('content')
  <h1>Nieuw vak toevoegen</h1>
  @include('common.error')

  {{Form::open(['route' => 'admin.subject.store'])}}
  <div class="form-group">
    {{Form::label('name', 'Naam: ')}}
    {{Form::text('name', Input::old('name'), ['class' => 'form-control'])}}
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
    {{Form::button('<i class="fa fa-check"></i> Toevoegen', [
      'class' => 'btn btn-success',
      'type' => 'submit'])}}

    <a class="btn btn-default" href="{{URL::route('admin.subject.index')}}">
      <i class="fa fa-arrow-left"></i> terug
    </a>
  </div>
  {{Form::close()}}
@stop
