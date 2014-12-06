@extends('templates.admin')

@section('content')
<h1>Bevestig verwijdering</h1>
<p>Weet je zeker dat je de comment van <strong>
  @if( is_object($comment->user))
    {{{$comment->user->fullname}}}
  @else
    <em>verwijderde gebruiker</em>
  @endif</strong>
  op <strong>
    @if(is_object($comment->homework))
    {{{$comment->homework->title}}}
    @else
    <em>verwijderd huiswerk</em>
    @endif
    </strong> Wilt verwijderen?
</p>

<strong>Reactie: </strong>
<div class="well">
  {{{ Util\Str::enter( e( $comment->body )) }}
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
