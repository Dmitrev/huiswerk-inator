@extends('templates.default')

@section('content')
  <h1>Je reactie bewerken</h1>
  @include('common.error')
  {{ Form::open(['route' => 'update-comment']) }}
    {{Form::hidden('id', $comment->id)}}
    <div class="form-group">
        {{Form::label('body', 'Reactie: ')}}
        {{Form::textarea('body', Input::old('body', $comment->body),['class' => 'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::submit('Bewerken', ['class' => 'btn btn-primary'])}}
      <a href="{{URL::route('homework', [$comment->homework_id])}}" class="btn btn-default">
        Annuleren
      </a>
    </div>

  {{ Form::close() }}

@stop
