@extends('templates.admin')

@section('content')
  <h1>Lijst met alle vakken</h1>
  <div class="form-group">
    <a href="{{URL::route('admin.subject.create')}}" class="btn btn-primary">
      <i class="fa fa-plus"></i> Vak toevoegen
    </a>
  </div>
  @include('common.success')
  @if( !isset($subjects) or $subjects->count() === 0 )
    @include('common.warning', ['message' => 'Er zijn geen vakken gevonden'])</p>
  @else
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Vak</th>
      </tr>
    </thead>
    <tbody>

      @foreach($subjects as $subject)

        <tr>
          <td>{{$subject->id}}</td>
          <td>{{$subject->name}}</td>
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
