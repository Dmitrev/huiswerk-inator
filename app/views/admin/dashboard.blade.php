@extends('templates.admin')

@section('content')

  <h1>Belangrijke meldingen</h1>

  @if( Session::has('deleted_item'))
    @include('common.success', ['message' => 'Melding <strong>'.Session::get('deleted_item').'</strong> is succesvol verwijderd.'])
  @else
    @include('common.success')
  @endif
  <a href="{{URL::route('admin-announcement.add')}}" class="btn btn-success"><i class="fa fa-plus"></i> Nieuwe melding</a>

  <table class="table">
    <thead>
      <tr>
        <th>Titel</th>
        <th>Staat</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $announcements as $announcement )
        <tr>
          <td><a href="{{URL::route('admin-announcement.show', [$announcement->id])}}">{{{$announcement->title}}}</a></td>
          <td>{{{ ($announcement->state == 1) ? 'aan' : 'uit'}}}</td>

        </tr>
      @endforeach
    </tbody>
  </table>

  {{$announcements->links()}}
@stop
