@extends('templates.default')

@section('content')
    <p>Ingelogd als {{ Auth::user()->fullname }}, <a href="{{URL::route('logout') }}">uitloggen</a></p>
    
    @include('common.success')
    
    <h1>Huiswerk</h1>
    
    <a class="btn btn-success" href="{{URL::route('add-homework')}}">Huiswerk toevoegen</a>
    <div class="wrapper">
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-xs-2">Deadline</th>
                <th class="col-xs-10">Huiswerk / Vak</th>
            </tr>
        </thead>
        <tbody>
        @foreach( $homework as $item )
            <tr>
                <td>
                    <span class="label label-danger">{{$item->deadline_day}} {{$item->deadline_month}}</span>
                </td>
                <td>
                    <div>
                        <span class="label label-default">{{$item->subject->abbreviation}}</span> 
                        <a href="{{URL::route('homework', [$item->id])}}">
                            {{{$item->title}}}
                        </a>
                    </div>
                    
                </td>
            </tr>    
            
        @endforeach
        </tbody>
    </table>

    </div>
    
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