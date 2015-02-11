@if( isset($homework) )

@foreach( $homework as $item )

        <tr @if( $item->user_done ) class="success" @endif>
            <td>
                <span class="label label-danger">{{$item->deadline_dayofweek}} {{$item->deadline_day}} {{$item->deadline_month}}</span>

            </td>
            <td>
                <div>
                    @if( is_object($item->subject))
                        <span class="label label-default">{{{$item->subject->abbreviation}}}</span>
                    @else
                        <span class="label label-warning">?</span>
                    @endif
                    @if( isset($item->comments) && $item->comments->count() > 0)
                        <span class="label label-default"><i class="fa fa-comment"></i> {{$item->comments->count()}}</span>
                    @endif
                    <a href="{{URL::route('homework', [$item->id])}}">
                        @if($item->user_done) <i class="fa fa-check"></i> @endif {{{$item->title}}}
                    </a>

                </div>
            </td>
        </tr>
    @endforeach
@endif