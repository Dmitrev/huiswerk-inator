@extends('templates.default')

@section('content')
    
    @include('common.back')
    <h1>Huiswerk toevoegen</h1>
    @include('common.error')
    {{Form::open(['route' => 'create-homework', 'role' => 'form'])}}
        <div class="form-group">
            {{Form::label('title', 'Titel: ')}}
            {{Form::text('title', Input::old('title'), ['class' => 'form-control', 'placeholder' => 'title'])}}
        </div>
        <div class="form-group">
        {{Form::label('subject_id', 'Vak: ')}}
            {{Form::select('subject_id', $subjects, Input::old('subject_id'), ['class' => 'form-control'] )}}  
        </div>    
        <div class="form-group">
            {{Form::label('content', 'Beschrijving: ')}}
            {{Form::textarea('content', Input::old('content'), ['class' => 'form-control', 'placeholder' => 'content'])}}
        </div>
        <div class="form-group">
            {{Form::label('deadline', 'Deadline: ')}}
            {{Form::text('deadline', Input::old('deadline'), ['class' => 'form-control', 'placeholder' => 'deadline'])}}
        </div>
        <div class="form-group text-right">    
            {{Form::submit('Toevoegen', ['class' => 'btn btn-success'])}}
        </div>
    {{Form::close()}}
@stop