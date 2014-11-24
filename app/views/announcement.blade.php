@extends('templates.default')

@section('content')
  @include('common.back')
  <h1>{{{$announcement->title}}}</h1>

  {{ Util\Str::enters( e( $announcement->message ) ) }}
@stop
