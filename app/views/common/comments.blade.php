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
  @if(isset($comments))
  <h2>Reacties</h2>

    @if( $comments->count() === 0)
      <p>Er zijn geen reacties geplaatst</p>
    @else
    @foreach($comments as $comment)
    <div class="comment-wrapper">
      <strong>{{{$comment->user->fullname}}}</strong>
      <div id="comment-{{$comment->id}}" class="panel panel-default">
        <div class="panel-body">
          {{ Util\Str::enters( e($comment->body)) }}
        </div>

      </div>
      {{-- Edit comment --}}
      @if( Auth::user()->id === $comment->user_id )
          <div>
            <a href="{{URL::route('edit-comment', [$comment->id])}}"><i class="fa fa-pencil"></i> bewerken</a>
            <a href="{{URL::route('confirm-delete-comment', [$comment->id])}}"><i class="fa fa-trash"></i> verwijderen</a>
          </div>
      @endif
    </div>
    @endforeach
  @endif
  @endif
</div>
@endif
