@extends('templates.default')

@section('content')
    @include('common.back-account')
    <h1>Wachtwoord wijzigen</h1>
    @include('common.error')
    @include('common.success')
    {{Form::open(['route' => 'change-account-password'])}}
        <div class="form-group">
            {{Form::label('old_password', 'Huidige wachtwoord: ')}}
            {{Form::password('old_password', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Nieuw Wachtwoord: ')}}
            {{Form::password('password', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('password_confirmation', 'Herhaal wachtwoord: ')}}
            {{Form::password('password_confirmation', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::submit('Wachwoord wijzigen', ['class' => 'btn btn-success'])}}
        </div>
    {{Form::close()}}
@stop