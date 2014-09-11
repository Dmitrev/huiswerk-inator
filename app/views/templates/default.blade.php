<!DOCTYPE html>
<html>
    
    <head>
        <title>{{$title or '- No title set -'}}</title>
        <!-- Include bootstrap -->
        {{HTML::style('plugins/bootstrap/css/bootstrap.min.css')}}
        <!-- Font awesome -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        {{HTML::style('css/main.css')}}
                
        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>
        
        <body>
            <div class="container">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
            <!--bootstrap js-->
            {{HTML::script('plugins/jquery/jquery.min.js')}}
            {{HTML::script('plugins/bootstrap/js/bootstrap.min.js')}}
        </body>
</html>