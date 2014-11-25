@extends('templates.default')

@section('content')

    @include('common.success')
    @foreach( $announcements as $announcement)
      <div class="alert alert-info" role="alert">
        <div class="row">
        <div class="col-xs-8"><i class="fa fa-bullhorn"></i> {{$announcement->title}}</div>
        <div class="col-xs-4">
          <a class="btn btn-default" href="{{URL::route('announcement', [$announcement->id])}}">Bekijken</a>
        </div>
      </div>
      </div>
    @endforeach

    <h1>@include('common.home-heading')</h1>
    {{--<a class="btn btn-success" href="{{URL::route('add-homework')}}">Huiswerk toevoegen</a>--}}
    <div class="wrapper">
      @include('common.home-nav')
    <table class="table table">
        <thead>
            <tr>
                <th class="col-xs-2">Deadline</th>
                <th class="col-xs-10">Huiswerk / Vak</th>
            </tr>
        </thead>
        <tbody>
        @foreach( $homework as $item )

            <tr @if( $item->user_done ) class="success" @endif>
                <td>
                    <span class="label label-danger">{{$item->deadline_day}} {{$item->deadline_month}}</span>
                    @if( isset($item->comments) && $item->comments->count() > 0)
                      <i class="fa fa-comment"></i> {{$item->comments->count()}}
                    @endif
                </td>
                <td>
                    <div>
                        <span class="label label-default">{{$item->subject->abbreviation}}</span>
                        <a href="{{URL::route('homework', [$item->id])}}">
                            @if($item->user_done) <i class="fa fa-check"></i> @endif {{{$item->title}}}
                        </a>



                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </div>



@stop


{{--<div class="row">
            <div class="homework-item">
                <div class="col-xs-2">

                     <span class="label label-danger">{{$item->deadline_day}} {{$item->deadline_month}}</span>

                </div>

                <div class="col-xs-10">



                        <div>
                            <a href="{{URL::route('homework', [$item->id])}}">
                                {{{$item->title}}}
                            </a>
                        </div>
                        <div>
                            <span class="label label-default">
                                {{$item->subject->abbreviation}}
                            </span>
                        </div>

                </div>
            </div>
        </div>--}}
