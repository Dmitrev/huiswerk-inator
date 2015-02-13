@extends('templates.default')

@section('content')
    @include('common.back')
    <h1>{{{$item->title}}}</h1>

    <ul id="homework-info" class="list-unstyled">
        <li>
            <span class="label big-label label-info">{{{$item->subject->name or 'Onbekend vak' }}}</span>

         </li>
        <li><span class="label big-label label-danger">{{{ $item->deadline_fulldayofweek}}} {{{$item->deadline_friendly}}}</span></li>

        <li><span class="label big-label label-primary">
          <i class="fa fa-user"></i> {{{$item->user->fullname or 'Onbekende Gebruiker'}}}
        </span></li>
    </ul>

    @if( Auth::user()->id === $item->author || Auth::user()->has('edit-homework'))
      <a href="{{URL::route('edit-homework', [$item->id])}}" class="btn btn-info"><i class="fa fa-pencil"></i> Bewerken</a>
    @endif

    @if( Auth::user()->id === $item->author || Auth::user()->has('delete-homework'))
      <a href="{{URL::route('delete-homework', [$item->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i> Verwijderen</a>
    @endif

    <h2>Beschrijving</h2>
    <div class="well">
      {{ Util\Str::enters( e($item->content) )}}
    </div>
    {{Form::open(['route' => 'homework-done'])}}
    {{Form::hidden('homework_id', $item->id)}}
    <div class="form-group">
      @if(!$user_done)
        {{Form::button('<i class="fa fa-check"></i> Ik heb de opdracht al klaar', ['class' => 'btn btn-default', 'type' => 'submit'])}}
      @else
        {{Form::button('<i class="fa fa-check"></i> Ik heb de opdracht al klaar', ['class' => 'btn btn-success', 'type' => 'submit'])}}
      @endif
    </div>
    {{Form::close()}}
    @include('common.comments')
@stop
