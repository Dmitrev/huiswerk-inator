@if( isset($homework) )

@foreach( $homework as $item )

        <div class="item @if( $item->user_done ) success @endif">
            <a href="{{URL::route('homework', [$item->id])}}">



                    <div class="description">
                        <div class="date">

                            {{$item->deadline_dayofweek}} {{$item->deadline_day}} {{$item->deadline_month}}

                        </div>
                        <h2 class="title">{{{$item->title}}}</h2>
                        @if(is_object($item->subject))
                            <em>{{{$item->subject->name}}}</em>
                        @endif
                    </div>

                    <div class="arrow">
                        <i class="fa fa-chevron-right"></i>
                    </div>
            </a>
        </div>
    @endforeach
@endif