@extends('templates.admin')

@section('content')
  <h1>Lijst met alle comments</h1>
  @include('common.success')
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Reactie</th>
        <th>Gebruiker</th>
        <th>Huiswerk</th>
      </tr>
    </thead>
    <tbody>
      @foreach($comments as $comment)
        <tr>
          <td><a href="{{URL::route('admin-comments.show', [$comment->id])}}">{{{substr($comment->body, 0, 20)}}}</a></td>
          <td>@if( is_object($comment->user))
            {{{$comment->user->fullname}}}
            @else
              <em>Verwijderde gebruiker</em>
            @endif</td>
          <td>

            @if( is_object($comment->homework))
            {{{$comment->homework->title}}}
            @else
              <em>Verwijderd huiswerk</em>
            @endif</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <p>{{$comments->appends( Input::except('page') )->links()}}</p>
@stop
