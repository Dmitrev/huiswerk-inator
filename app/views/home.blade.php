@extends('templates.default')

@section('content')

    @include('common.success')
    @foreach( $announcements as $announcement)
      <div class="alert alert-info" role="alert">
        <div class="row">
        <div class="col-xs-7"><i class="fa fa-bullhorn"></i> {{{$announcement->title}}}</div>
        <div class="col-xs-5">
          <a class="btn btn-warning" href="{{URL::route('announcement', [$announcement->id])}}">Bekijken</a>
        </div>
      </div>
      </div>
    @endforeach

    <h1>@include('common.home-heading')</h1>
    {{--<a class="btn btn-success" href="{{URL::route('add-homework')}}">Huiswerk toevoegen</a>--}}
    <div class="wrapper">
      @include('common.home-nav')


    @if( $homework->count() === 0)
      @include('common.warning', ['message' => 'Er is geen huiswerk voor deze week'])
    @else

    <table class="table table">
        <thead>
            <tr>
                <th class="col-xs-2">Deadline</th>
                <th class="col-xs-10">Huiswerk / Vak</th>
            </tr>
        </thead>
        <tbody id="homework-container">
            @include('common.homework-rows', ['homework' => $homework])
        </tbody>
    </table>
    @endif
    </div>
    @if( $homework->getCurrentPage() < $homework->getLastPage() )
        <button id="load-homework" class="btn btn-primary">Meer huiswerk tonen</button>
    @endif
@stop

@section('js')
    <script type="text/javascript">
        var currentPage = {{ $homework->getCurrentPage() }};
    </script>
    {{HTML::script('js/timeline.js')}}
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
                                {{{$item->subject->abbreviation}}}
                            </span>
                        </div>

                </div>
            </div>
        </div>--}}
