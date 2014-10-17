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
          <td><a href="{{URL::route('admin-comments.show', [$comment->id])}}">{{$comment->body}}</a></td>
          <td>{{$comment->user->fullname}}</td>
          <td>{{$comment->homework->title}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <p>{{$comments->appends( Input::except('page') )->links()}}</p>
@stop
