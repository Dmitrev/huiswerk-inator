@extends('templates.default')

@section('content')
    @include('common.back',[
      'url' => URL::route('homework', [$homework->id])
    ])
    <h1>Huiswerk bewerken</h1>
    @include('common.error')

    {{Form::open(['route' => ['store-homework', $homework->id], 'role' => 'form', 'method' => 'PUT'])}}
        <div class="form-group">
            {{Form::label('title', 'Titel: ')}}
            {{Form::text('title', Input::old('title', $homework->title), ['class' => 'form-control', 'placeholder' => 'title'])}}
        </div>
        <div class="form-group">
        {{Form::label('subject_id', 'Vak: ')}}
            {{Form::select('subject_id', $subjects, Input::old('subject_id', $homework->subject_id), ['class' => 'form-control'] )}}
        </div>
        <div class="form-group">
            {{Form::label('content', 'Beschrijving: ')}}
            {{Form::textarea('content', Input::old('content', $homework->content), ['class' => 'form-control', 'placeholder' => 'content'])}}
        </div>
        <div class="form-group">
            {{Form::label('deadline', 'Deadline: ')}}
            {{Form::text('deadline', null, [
              'class' => 'form-control datepicker',
              'data-value' => Input::old('deadline', $homework->deadline),
              'placeholder' => 'Raak dit veld aan om een datum te kiezen'
            ])}}
        </div>
        <div class="form-group text-right">
            {{Form::submit('Opslaan', ['class' => 'btn btn-success'])}}
        </div>
    {{Form::close()}}
@stop
