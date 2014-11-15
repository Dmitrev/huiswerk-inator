@extends('templates.admin')

@section('content')
  <h1>Lijst met alle vakken</h1>
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
