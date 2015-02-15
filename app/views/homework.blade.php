@extends('templates.default')

@section('content')

    @include('common.back')
    <div class="homework">
    <h1>{{{$item->title}}}</h1>

    <div class="date-badge">
        {{{ $item->deadline_fulldayofweek}}} {{{$item->deadline_friendly}}}
    </div>

    <div class="description">
        {{ Util\Str::comment( $item->content )}}
    </div>

    <div class="controls">
        {{Form::open(['route' => 'homework-done'])}}
        {{Form::hidden('homework_id', $item->id)}}
        <div class="done">
            @if(!$user_done)
                {{Form::button('<i class="fa fa-check"></i>', ['class' => 'action-btn', 'type' => 'submit'])}}
                <em>Afstrepen</em>
            @else
                {{Form::button('<i class="fa fa-check"></i>', ['class' => 'btn btn-success', 'type' => 'submit'])}}
                <em>Ongedaan maken</em>
            @endif
        </div>
        <div class="edit">
            @if( Auth::user()->id === $item->author || Auth::user()->has('edit-homework'))
                <a href="{{URL::route('edit-homework', [$item->id])}}" class="action-btn"><i class="fa fa-pencil"></i></a>
                <em>Wijzigen</em>
            @endif
        </div>
        <div class="delete">

            @if( Auth::user()->id === $item->author || Auth::user()->has('delete-homework'))
                <a href="{{URL::route('delete-homework', [$item->id])}}" class="action-btn"><i class="fa fa-trash"></i></a>
                <em>Verwijderen</em>
            @endif

        </div>
        {{Form::close()}}
    </div>
    <div class="info">
        <div class="author">
            <dl>
                <dt>Geplaats door:</dt>
                <dd>{{{$item->user->fullname or 'Onbekende Gebruiker'}}}</strong></dd>
            </dl>
        </div>
        <div class="subject">
            <dl>
                <dt>Vak:</dt>
                <dd>
            @if( is_object($item->subject))
                {{{$item->subject->name}}}
            @else
                Onbekend
            @endif
                </dd>
            </dl>
        </div>
    </div>
    </div>

    @include('common.comments')
@stop
