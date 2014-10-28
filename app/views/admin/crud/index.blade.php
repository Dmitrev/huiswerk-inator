@extends('templates.admin')

@section('content')
  <h1>Overview</h1>

  <table class="table">
    <thead>

      <tr>
        @foreach($data as $row)
          <th>{{$row['heading']}}</td>
        @endforeach
      </tr>

    </thead>

    <tbody>
      @foreach($entries as $entry)

      <tr>
        @foreach( $data as $row)
          <td>

            @if( isset( $row['link'] ) )
              <a href="{{URL::route('admin.'.$resource.'.show', [$entry->id])}}">
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
@stop
