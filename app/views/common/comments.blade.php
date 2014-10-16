@if(isset($item))
<div id="comments">
  @include('common.error')
  @include('common.success')
  <h2>Reacties</h2>
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

  @endif
</div>
@endif
