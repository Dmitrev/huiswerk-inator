@extends('templates.admin')

@section('content')
  @if(Session::has('deleted_item'))
    @include('common.success', ['message' => 'Sucessfully deleted item <strong>'.Session::get('deleted_item').'</strong>'])
  @else
    @include('common.success')
  @endif

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
          <td><a href="{{URL::route('admin-homework.show',[$item->id])}}">{{{$item->title}}}</a></td>
          <td>
            @if( is_object($item->subject))
            {{{$item->subject->name}}}
            @else
              <em>verwijderd vak</em>
            @endif
          </td>
          <td>{{{$item->deadline_friendly}}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <p>{{$homework->appends( Input::except('page') )->links() }}</p>
@stop
