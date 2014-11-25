@extends('templates.default')

@section('content')
  @include('common.back')
  <h1>{{{$announcement->title}}}</h1>

  <div class="well">
    {{ Util\Str::enters( e( $announcement->message ) ) }}
  </div>
@stop
