@extends('templates.admin')

@section('content')
  <dl>
    <dt>Gebruiker: </dt>
    <dd>
      @if( is_object($comment->user))
      {{{$comment->user->fullname}}}
      @else
      <em>Verwijderde gebruiker</em>
      @endif
      </dd>
    <dt>Huiswerk: </dt>
    <dd>
      @if(is_object($comment->homework))
        {{{$comment->homework->title}}}
      @else
        <em>Verwijdered huiswerk</em>
      @endif</dd>
    <dt>Comment: </dt>
    <dd>
      <div class="well">
        {{ Util\Str::enters( e( $comment->body ) ) }}
      </div>
    </dd>
  </dl>

  <p>
    <a href="{{URL::route('admin-comments.edit', [$comment->id])}}" class="btn btn-default">Bewerken</a>
    <a href="{{URL::route('admin-comments.confirm-delete', [$comment->id])}}" class="btn btn-danger">Verwijderen</a>
  </p>
@stop
