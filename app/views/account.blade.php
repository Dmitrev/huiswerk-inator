@extends('templates.default')

@section('content')
    @include('common.back')
    <h1>Account</h1>
    <ul>
        <li><a href="{{URL::route('account-general')}}">Algemeen</a></li>
        <li><a href="{{URL::route('account-password')}}">Wachtwoord wijzigen</a></li>
        <li><a href="{{URL::route('account-security')}}">Beveiligingsvraag</a></li>

    </ul>
@stop