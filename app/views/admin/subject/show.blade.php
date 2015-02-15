@extends('templates.admin')

@section('content')
  <div class="form-group">
    <a href="{{URL::route('admin.subject.index')}}" class="btn btn-default">
      <i class="fa fa-arrow-left"></i> Terug naar overzicht
    </a>

  </div>
  <h1>Vak bekijken</h1>


  @if( isset($subject) && is_object($subject) )
  <dl>
    <dt>ID</dt>
    <dd>{{$subject->id}}</dd>

    <dt>Naam</dt>
    <dd>{{{$subject->name}}}</dd>

    <dt>Staat</dt>
    <dd>{{{ ($subject->state == 1) ? 'aan' : 'uit' }}}</dd>
  </dl>

  <div class="form-group">
    @include('common.admin-actions',
    [
      'prefix' => 'admin.subject',
      'entry' => $subject
    ])
  </div>

  @endif
@stop
