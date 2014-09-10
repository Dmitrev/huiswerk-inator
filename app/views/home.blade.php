@extends('templates.default')

@section('content')
    Ingelogd als {{ Auth::user()->fullname }}, <a href="{{URL::route('logout') }}">uitloggen</a>
@stop