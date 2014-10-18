<ul class="pager">
@if( !isset($older) && !isset($newer) )

  <li class="previous"><a href="{{URL::route('home-older', 1)}}">&larr; Vorige week</a></li>
  <li class="next"><a href="{{URL::route('home-newer')}}">Volgende week &rarr;</a></li>

@elseif( isset($older))

  <li class="previous"><a href="{{URL::route('home-older', $older+1)}}">&larr; {{$older+1}} weken terug</a></li>

  @if( $older ==  1)

    <li class="next"><a href="{{URL::route('home')}}">Deze week &rarr;</a></li>
  @elseif( $older == 2)
    <li class="next"><a href="{{URL::route('home-older')}}">Vorige week &rarr;</a></li>

  @else
    <li class="next"><a href="{{URL::route('home-older', $older-1 )}}">{{$older-1}} weken terug &rarr;</a></li>
  @endif

@elseif( isset($newer) )

  @if( $newer == 1)
    <li class="previous"><a href="{{URL::route('home')}}">&larr; Deze week</a></li>
  @elseif ($newer == 2)
    <li class="previous"><a href="{{URL::route('home-newer')}}">&larr; Volgende week</a></li>
  @else
    <li class="previous"><a href="{{URL::route('home-newer', $newer-1)}}">&larr; {{$newer-1}} weken later</a></li>
  @endif
  <li class="next"><a href="{{URL::route('home-newer', $newer+1)}}"> {{$newer+1}} weken later &rarr;</a></li>

@endif
</ul>
