@if(isset($item))
<div id="comments">
  @include('common.error')
  @include('common.success')

  {{Form::open(['route' => 'new-comment'])}}
  <div class="form-group">
    {{Form::label('comment', 'Reactie:')}}
    {{Form::textarea('comment', Input::old('comment'), [
      'class' => 'form-control',
      'rows' => '2',
      'placeholder' => 'Reageer op dit huiswerk'
    ])}}
    {{Form::hidden('homework_id', $item->id)}}
  </div>
  <div class="form-group">
    {{Form::submit('Reactie plaatsen', ['class' => 'btn btn-primary btn-block'])}}
  </div>
  {{Form::close()}}
  <h2>Reacties</h2>
  @if(isset($comments))
    @foreach($comments as $comment)
      <strong>{{$comment->user->fullname}}</strong>
      <div id="comment-{{$comment->id}}" class="panel panel-default">
        <div class="panel-body">
          {{$comment->body}}
        </div>
      </div>
    @endforeach
  @endif
</div>
@endif
