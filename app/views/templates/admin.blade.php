@extends('templates.base')

@section('template')
  @include('common.admin-nav')
  
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        @yield('content')
      </div>
    </div>
  </div>
@stop
