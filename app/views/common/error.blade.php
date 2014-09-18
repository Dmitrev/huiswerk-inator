@if( Session::has('error') )
    
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong><i class="fa fa-exclamation-triangle"></i></strong> {{Session::get('error')}}
    </div>
        
@elseif( Session::has('errors'))
   
    @foreach( Session::get('errors')->all() as $error )
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong><i class="fa fa-exclamation-triangle"></i></strong> {{$error}}
        </div>
        
    @endforeach

@endif