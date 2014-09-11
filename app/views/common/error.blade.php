@if( Session::has('error') )
    
    <p>{{ Session::get('error') }}</p>
        
@elseif( Session::has('errors'))
   
    @foreach( Session::get('errors')->all() as $error )
        <p>{{$error}}</p>
    @endforeach
    
@endif