@extends('templates.default')

@section('content')
  <h1>Bevestig verwijdering</h1>
  <p>Weet je zeker dat je jouw reactie op <strong>{{$comment->homework->title or 'verwijderd huiswerk'}}</strong>
    wilt verwijderen?
  </p>

  <strong>Reactie: </strong>
  <div class="well">
    {{$comment->body}}
  </div>

  <div class="form-group">
    {{Form::open(['route' => 'delete-comment'])}}
      {{Form::hidden('comment_id', $comment->id)}}
      {{Form::submit('Ja', ['class' => 'btn btn-danger'])}}
      <a href="{{URL::route('homework', [$comment->homework_id])}}" class="btn btn-default">
          Nee
      </a>
    {{Form::close()}}
  </div>
@stop
