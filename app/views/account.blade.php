@extends('templates.default')

@section('content')
    @include('common.back')
    <h1>Account</h1>

    <div class="list-group">
    <a href="{{URL::route('account-general')}}" class="list-group-item">
      <h4 class="list-group-item-heading"><i class="fa fa-user"></i> Algemeen</h4>
      <p class="list-group-item-text">Naam en gebruiksernaam wijzigen</p>
    </a>

    <a href="{{URL::route('account-password')}}" class="list-group-item">
      <h4 class="list-group-item-heading"><i class="fa fa-lock"></i> Wachtwoord wijzigen</h4>
      <p class="list-group-item-text">Wijzig het wachtwoord waar je mee inlogd</p>
    </a>

    <a href="{{URL::route('account-security')}}" class="list-group-item">
      <h4 class="list-group-item-heading"><i class="fa fa-key"></i> Beveiligingsvraag</h4>
      <p class="list-group-item-text">Beveiligingsvraag instellen voor het herstellen van je account</p>
    </a>
  </div>
@stop
