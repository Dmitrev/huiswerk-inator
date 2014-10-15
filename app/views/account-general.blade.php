@extends('templates.default')

@section('content')
    @include('common.back-account')
    <h1>Mijn account</h1>
    @include('common.success')
    @include('common.error')
    {{ Form::open(['route' => 'save-general-account-settings']) }}
        <h2>Algemeen</h2>

        <div class="form-group">
            {{Form::label('fullname', 'Volledige naam: ')}}
            {{Form::text('fullname', Input::old('fullname', $user->fullname), ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('cur_username', 'Gebruikersnaam: ')}}
            <p class="form-control-static">{{$user->username}}</p>
        </div>

        <div class="form-group">
            {{Form::label('username', 'Nieuwe Gebruikersnaam: ')}}
            {{Form::text('username', Input::old('username'), ['class' => 'form-control'])}}
        </div>

        <div class="form-group">

            {{Form::submit('Opslaan', ['class' => 'btn btn-success'])}}
        </div>
    {{ Form::close() }}
@stop
