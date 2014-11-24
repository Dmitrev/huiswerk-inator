@extends('templates.default')

@section('content')
    @include('common.i-back')
    <h1>{{$item->title}}</h1>

    <ul class="list-inline">
        <li><span class="label label-info">{{$item->subject->name}}</span></li>
        <li><span class="label label-danger">{{$item->deadline_friendly}}</span></li>
    </ul>
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
