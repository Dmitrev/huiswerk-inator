@extends('templates.default')

@section('content')
    <a href="{{URL::route('login')}}" class="btn btn-default">
        <i class="fa fa-chevron-left"></i>
        Terug naar Login
    </a>
    <h1>Account maken</h1>
    {{Form::open(['role' => 'form'])}}
        <div class="form-group">
            {{Form::label('fullname', 'Volledige naam: ')}}
            {{Form::text('fullname', Input::old('fullname'), ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('username', 'Kies een gebruikersnaam: ')}}
            {{Form::text('username', Input::old('username'), ['class' => 'form-control'])}}
        </div>
            <div class="form-group">
            {{Form::label('password', 'Kies een wachtwoord: ')}}
            {{Form::password('password', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::submit('Account aanmaken', ['class' => 'btn btn-success'])}}
        </div>
    {{Form::close()}}
@stop