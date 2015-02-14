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
            {{Form::textarea('content', Input::old('content'), [ 'id' => 'summernote', 'class' => 'form-control', 'placeholder' => 'content'])}}
        </div>
        <div class="form-group">
            {{Form::label('deadline', 'Deadline: ')}}
            {{Form::text('deadline', null, [
              'class' => 'form-control datepicker',
              'data-value' => Input::old('deadline'),
              'placeholder' => 'Raak dit veld aan om een datum te kiezen'
            ])}}
        </div>
        <div class="form-group text-right">
            {{Form::submit('Toevoegen', ['class' => 'btn btn-success'])}}
        </div>
    {{Form::close()}}
@stop

@section('js')
    <script>
        $('#summernote').summernote({
            toolbar: [
                //[groupname, [button list]]

                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],

                ['para', ['ul', 'ol']]
            ]
        });
    </script>
@stop