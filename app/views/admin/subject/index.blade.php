@extends('templates.admin')

@section('content')
  <h1>Lijst met alle vakken</h1>
  <div class="form-group">
    <a href="{{URL::route('admin.subject.create')}}" class="btn btn-primary">
      <i class="fa fa-plus"></i> Vak toevoegen
    </a>
  </div>

  @if( Session::has('del_item'))
  @include('common.success', ['message' => 'Vak <strong>'.Session::get('del_item').'</strong> is succesvol verwijdered'])
  @else
  @include('common.success')
  @endif

  @if( !isset($subjects) or $subjects->count() === 0 )
    @include('common.warning', ['message' => 'Er zijn geen vakken gevonden'])</p>
  @else
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Vak</th>
        <th>Staat</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody>

      @foreach($subjects as $subject)

        <tr>
          <td>{{$subject->id}}</td>
          <td><a href="{{URL::route('admin.subject.show', [$subject->id])}}">{{{$subject->name}}}</a></td>
          <td>{{{ ($subject->state == 1) ? 'aan' : 'uit' }}}</td>
          <td>
            @include('common.admin-actions', [
              'prefix' => 'admin.subject',
              'entry' => $subject]
            )
          </td>
        </tr>

      @endforeach
    </tbody>
  </table>
  @endif

  @if(method_exists($subjects, 'links'))
  <div class="form-group">
    {{$subjects->links()}}
  </div>
  @endif
@stop
