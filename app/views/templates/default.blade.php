@extends('templates.base')

@section('template')
@include('common.nav')
            <div id="container" class="container">
              <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
              </div>
            </div>
@stop
