<!DOCTYPE html>
<html>

    <head>
        <title>{{$title or '- No title set -'}}</title>
        <!-- Include bootstrap -->
        {{HTML::style('plugins/bootstrap/css/bootstrap.min.css')}}
        {{HTML::style('plugins/pickdate/themes/default.css')}}
        {{HTML::style('plugins/pickdate/themes/default.date.css')}}


        <!-- Font awesome -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="apple-touch-icon" sizes="57x57" href="{{URL::asset('images/favicons/apple-touch-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('images/favicons/apple-touch-icon-114x114.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('images/favicons/apple-touch-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{URL::asset('images/favicons/apple-touch-icon-144x144.png')}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{URL::asset('images/favicons/apple-touch-icon-60x60.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{URL::asset('images/favicons/apple-touch-icon-120x120.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('images/favicons/apple-touch-icon-76x76.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{URL::asset('images/favicons/apple-touch-icon-152x152.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('images/favicons/apple-touch-icon-180x180.png')}}">
        <link rel="icon" type="image/png" href="{{URL::asset('images/favicons/favicon-192x192.png')}}" sizes="192x192">
        <link rel="icon" type="image/png" href="{{URL::asset('images/favicons/favicon-160x160.png')}}" sizes="160x160">
        <link rel="icon" type="image/png" href="{{URL::asset('images/favicons/favicon-96x96.png')}}" sizes="96x96">
        <link rel="icon" type="image/png" href="{{URL::asset('images/favicons/favicon-16x16.png')}}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{URL::asset('images/favicons/favicon-32x32.png')}}" sizes="32x32">
        <meta name="msapplication-TileColor" content="#b91d47">
        <meta name="msapplication-TileImage" content="{{URL::asset('images/favicons/mstile-144x144.png')}}">

        {{HTML::style('css/main.css?v1.0.6')}}


        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>

        <body>

            @yield('template')

            <!--bootstrap js-->
            {{HTML::script('plugins/jquery/jquery.min.js')}}
            {{HTML::script('plugins/bootstrap/js/bootstrap.min.js')}}
            {{HTML::script('plugins/pickdate/compressed/picker.js')}}
            {{HTML::script('plugins/pickdate/compressed/picker.date.js')}}
            {{HTML::script('js/datepicker.js')}}

            @yield('js')
        </body>
</html>
