<!DOCTYPE html>
<html>

    <head>
        <title>{{$title or '- No title set -'}}</title>
        <!-- Include bootstrap -->
        {{HTML::style('plugins/bootstrap/css/bootstrap.min.css')}}
        {{HTML::style('plugins/pickadate/lib/themes/default.css')}}
        {{HTML::style('plugins/pickadate/lib/themes/default.date.css')}}


        <!-- Font awesome -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="apple-touch-icon-precomposed" href="{{URL::asset('favicon.png')}}">
        <link rel="icon" href="{{URL::asset('favicon.ico')}}" type="image/x-icon" />

        {{HTML::style('css/main.css')}}


        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>

        <body>

            @yield('template')

            <!--bootstrap js-->
            {{HTML::script('plugins/jquery/jquery.min.js')}}
            {{HTML::script('plugins/bootstrap/js/bootstrap.min.js')}}
            {{HTML::script('plugins/pickadate/lib/compressed/picker.js')}}
            {{HTML::script('plugins/pickadate/lib/compressed/picker.date.js')}}
            {{HTML::script('js/datepicker.js')}}

            @yield('js')
        </body>
</html>
