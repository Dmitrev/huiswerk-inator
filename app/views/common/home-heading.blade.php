@if( !isset($older) && !isset($newer))
  Huiswerk voor de week

@elseif( isset($older) )

  @if($older == 1)
    Huiswerk van vorige week
  @else
    Huiswerk van {{$older}} weken terug
  @endif

@elseif( isset($newer))
  @if( $newer == 1)
    Huiswerk voor volgende week
  @else
    Huiswerk voor {{$newer}} weken later
  @endif
@endif
