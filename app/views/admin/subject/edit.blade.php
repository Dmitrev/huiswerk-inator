@extends('templates.admin')

@section('content')

<h1>Vak bewerken</h1>

@include('common.error')

{{Form::open(['route' => ['admin.subject.update', $subject->id], 'method' => 'PATCH'])}}

<div class="form-group">
  {{Form::label('name', 'Naam: ')}}
  {{Form::text('name', Input::old('name', $subject->name), ['class' => 'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('state', 'staat')}}
    {{Form::select('state', [
      0 => 'uit',
      1 => 'aan'
    ],
    Input::old('state', $subject->state),
    ['class' => 'form-control'] )}}

</div>

<div class="form-group">
  {{Form::button('<i class="fa fa-save"></i> Bewerken', [
    'class' => 'btn btn-success',
    'type' => 'submit'])}}

  <a class="btn btn-default" href="{{URL::route('admin.subject.index')}}">
    <i class="fa fa-arrow-left"></i> terug
  </a>
</div>
{{Form::close()}}
@stop
