@extends('templates.admin')

@section('content')
<h1>Bevestig verwijdering</h1>
<p>Weet je zeker dat je de comment van <strong>{{$comment->user->fullname}}</strong>
  op <strong>{{$comment->homework->title}}</strong> Wilt verwijderen?
</p>

<strong>Reactie: </strong>
<div class="well">
  {{$comment->body}}
</div>

<div class="form-group">
  {{Form::open(['route' => 'admin-comments.delete'])}}
    {{Form::hidden('comment_id', $comment->id)}}
    {{Form::submit('Ja', ['class' => 'btn btn-danger'])}}
    <a href="{{URL::route('admin-comments.show', [$comment->id])}}" class="btn btn-default">
        Nee
    </a>
  {{Form::close()}}
</div>
@stop
