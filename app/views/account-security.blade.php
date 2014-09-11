@extends('templates.default')

@section('content')
    @include('common.back-account')
    <h1>Beveiligingsvraag</h1>
    @include('common.success')
    @include('common.error')
    
    
    
    {{Form::open(['route' => 'change-account-security'])}}
    
        <div class="form-group">
            <p><strong>Huidige vraag: </strong></p>
            @if( $user->secret_question)
                {{$user->secret_question}}
            @else
                <em>Niet ingesteld</em>
            @endif
        </div>
    
        <div class="form-group">
            {{Form::label('secret_question', 'Nieuwe beveiligings vraag:' )}}
            {{Form::text('secret_question', Input::old('security_question'), ['class' => 'form-control'])}}
        </div>
            
        <div class="form-group">
            {{Form::label('secret_answer', 'Geheim antwoord:' )}}
            {{Form::password('secret_answer', ['class' => 'form-control'] )}}
        </div>
            
        <div class="form-group">
            {{Form::submit('Beveiligingsvraag opslaan', ['class' => 'btn btn-success'])}}
        </div>
    {{Form::close()}}
@stop