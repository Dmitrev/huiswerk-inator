@extends('templates.admin')

@section('content')
  <h1>{{$data['heading'] or 'overzicht'}}</h1>

  <table class="table">
    <thead>

      <tr>
        @foreach($data['cols'] as $row)
          <th>{{$row['heading']}}</td>
        @endforeach
      </tr>

    </thead>

    <tbody>
      @foreach($data['entries'] as $entry)

      <tr>
        @foreach( $data['cols'] as $row)
          <td>

            @if( isset( $row['link'] ) )
              <a href="{{URL::route('admin.'.$data['resource'].'.show', [$entry->id])}}">
            @endif
              {{$entry->$row['source']}}
            @if( isset( $row['link'] ) )
              </a>
            @endif
          </td>


        @endforeach
        </tr>
      @endforeach
    </tbody>
  </table>

  @if( method_exists($data['entries'], 'links'))
    {{$data['entries']->appends( Input::except('page') )->links()}}
  @endif
@stop
