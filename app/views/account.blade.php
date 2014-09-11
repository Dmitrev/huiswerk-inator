@extends('templates.default')

@section('content')
    @include('common.back')
    <h1>Account</h1>
    <ul>
        <li><a href="{{URL::route('account-general')}}">Algemeen</a></li>
    </ul>
@stop