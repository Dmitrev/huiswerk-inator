@extends('templates.base')

@section('template')
  @include('common.admin-nav')

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group">
          <a class="btn btn-default" href="{{URL::route('home')}}">
            <i class="fa fa-home"></i>Terug naar app
          </a>
        </div>
        @yield('content')
      </div>
    </div>
  </div>
@stop
