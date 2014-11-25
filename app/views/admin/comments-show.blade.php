@extends('templates.admin')

@section('content')
  <dl>
    <dt>Gebruiker: </dt>
    <dd>{{{$comment->user->fullname}}}</dd>
    <dt>Huiswerk: </dt>
    <dd>{{{$comment->homework->title}}}</dd>
    <dt>Comment: </dt>
    <dd>
      <div class="well">
        {{ Utl\Str::enters( e( $comment->body ) ) }}
      </div>
    </dd>
  </dl>

  <p>
    <a href="{{URL::route('admin-comments.edit', [$comment->id])}}" class="btn btn-default">Bewerken</a>
    <a href="{{URL::route('admin-comments.confirm-delete', [$comment->id])}}" class="btn btn-danger">Verwijderen</a>
  </p>
@stop
