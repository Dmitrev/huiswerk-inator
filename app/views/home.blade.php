@extends('templates.default')

@section('content')
    <p>Ingelogd als {{ Auth::user()->fullname }}, <a href="{{URL::route('logout') }}">uitloggen</a></p>
    <p>
      <a href="{{URL::route('account')}}" class="btn btn-default">
      <i class="fa fa-cog"></i>  Mijn account
      </a>
    @if( Auth::user()->has('admin') )
      <a href="{{URL::route('admin-dashboard')}}" class="btn btn-default">
        <i class="fa fa-tachometer"></i> Admin Dashboard
      </a>
    @endif
    </p>
    @include('common.success')
    @foreach( $announcements as $announcement)
      <div class="alert alert-info" role="alert">
        <i class="fa fa-bullhorn"></i> {{$announcement->title}}
      </div>
    @endforeach

    <h1>@include('common.home-heading')</h1>
    <a class="btn btn-success" href="{{URL::route('add-homework')}}">Huiswerk toevoegen</a>
    <div class="wrapper">
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

    @include('common.home-nav')
    {{$homework->links('pagination::simple')}}
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
