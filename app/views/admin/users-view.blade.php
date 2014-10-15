@extends('templates.admin')

@section('content')


  @if( Input::has('q'))
    <h1>Zoekresulaten voor '{{Input::get('q')}}'</h1>

    <p>
      <a href="{{URL::route('admin-users.view')}}" class="btn btn-primary">
        Alle gebruikers weergeven
      </a>
    </p>

  @else
    <h1>Alle gebruikers</h1>
  @endif

  {{Form::open(['method' => 'get'])}}

      <div class="form-group">
         <div class="input-group">
           {{Form::text('q', Input::get('q'), [
            'class' => 'form-control',
            'placeholder' => 'Zoeken op gebruikersnaam of naam'
           ])}}
           <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <i class="fa fa-search"></i>
            </button>
            </span>
          </div>
        </div>

  {{Form::close()}}


  <table class="table table-striped">
    <thead>
      <tr>
        <th>Naam</th>
        <th>Gebruikersnaam</th>
        <th>Groep</th>
      </tr>
    </thead>
    <tbody>
  @foreach( $users as $user)
      <tr>
        <td>{{$user->fullname}}</td>
        <td>{{$user->username}}</td>
        <td>{{$user->userGroup->getName()}}</td>
      </tr>
  @endforeach
    </tbody>
  </table>

  {{$users->appends( Input::except('page') )->links()}}
@stop
