@extends('templates.login')

@section('content')

    @include('common.error')
    @include('common.success')
    <h1>Huiswerk Inator</h1>
    {{Form::open( ['route'=>'validate', 'class' => 'form-horizontal', 'role' => 'form'])}}
        <div class="form-group">
            {{Form::label('username', 'Gebruikersnaam: ', ['class' => 'col-sm-2 control-label'])}}
            <div class="col-sm-10">
                {{Form::text('username', Input::old('username'), [ 'class' => 'form-control', 'placeholder' => 'Gebruikersnaam'])}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('password', 'Wachtwoord: ', ['class' => 'col-sm-2 control-label'])}}
            <div class="col-sm-10">
                {{Form::password('password', [ 'class' => 'form-control', 'placeholder' => 'Wachtwoord'])}}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                      {{Form::checkbox('remember_me', 1, true)}}
                      Ingelogd blijven
                    </label>
                </div>
            </div>
        </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{Form::submit('Inloggen', ['class' => 'btn btn-primary'])}}
            <a href="{{URL::route('forgot-password')}}" class="btn btn-default">Wachtwoord vergeten?</a>
        </div>
    </div>

    {{Form::close()}}

    <h2>Nog geen account?</h2>
        <a class="btn btn-info" href="{{URL::route('create-account')}}">Account aanmaken</a>
@stop
