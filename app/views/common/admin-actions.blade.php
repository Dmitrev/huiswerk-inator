@if( isset($prefix, $entry) )

{{Form::open( ['route' => [$prefix.'.destroy', $entry->id], 'method' => 'DELETE'])}}
<a href="{{URL::route($prefix.'.edit', [$entry->id])}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
{{Form::close()}}
@endif
