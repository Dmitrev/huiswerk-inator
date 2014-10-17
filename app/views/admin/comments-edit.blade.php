@extends('templates.admin')

@section('content')
  <h1>Comment bewerken</h1>
  @include('common.success')
  @include('common.error')
  {{Form::open(['route' => 'admin-comments.save'])}}
    {{Form::hidden('comment_id', $comment->id)}}
    <div class="form-group">
      {{Form::label('body', 'Reactie: ')}}
      {{Form::textarea('body', Input::old('body', $comment->body), ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
      {{Form::button('<i class="fa fa-save"></i> Wijzigingen opslaan', ['type' => 'submit', 'class' => 'btn btn-primary btn-block btn-lg'])}}
    </div>
  {{Form::close()}}
@stop
