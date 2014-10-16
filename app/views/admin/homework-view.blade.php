@extends('templates.admin')

@section('content')

  <h1>Alle Huiswerk items</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Vak</th>
        <th>Deadline</th>
      </tr>
    </thead>
    <tbody>
      @foreach($homework as $item)
        <tr>
          <td>{{$item->title}}</td>
          <td>{{$item->subject->name}}</td>
          <td>{{$item->deadline_friendly}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <p>{{$homework->appends( Input::except('page') )->links() }}</p>
@stop
