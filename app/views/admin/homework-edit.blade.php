@extends('templates.admin')

@section('content')
  @include('common.error')
  @include('common.success')

  <h1>'{{$homework->title}}' bewerken</h1>

  {{Form::open(['route' => 'admin-homework.save'])}}
    {{Form::hidden('homework_id', $homework->id)}}

    <div class="form-group">
      {{Form::label('title', 'Titel: ')}}
      {{Form::text('title', Input::old('title', $homework->title), ['class' => 'form-control'])}}
    </div>
    
    <div class="form-group">
    {{Form::label('subject_id', 'Vak: ')}}
        {{Form::select('subject_id', $subjects, Input::old('subject_id', $homework->subject_id), ['class' => 'form-control'] )}}
    </div>

    <div class="form-group">
      {{Form::label('content', 'Beschrijving: (Raak veld aan om te kiezen )')}}
      {{Form::textarea('content', Input::old('content', $homework->content), ['id' => 'summernote', 'class' => 'form-control'])}}
    </div>

    <div class="form-group">
      {{Form::label('deadline', 'Deadline: ')}}
      {{Form::text('deadline', null, [
        'class' => 'form-control datepicker',
        'data-value' => Input::old('deadline', $homework->deadline),
        'placeholder' => 'Raak dit veld aan om een datum te kiezen'
      ])}}
    </div>

    <div class="form-group">
      {{Form::button('<i class="fa fa-save"></i> Wijzigingen opslaan', ['type' => 'submit', 'class' => 'btn btn-primary btn-lg btn-block'])}}
    </div>
  {{Form::close()}}
@stop

@section('js')
    {{HTML::script('js/editor.js')}}
@stop
