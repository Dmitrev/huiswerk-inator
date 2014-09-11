@if( Session::has('success'))
   <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong><i class="fa fa-smile-o"></i></strong> {{Session::get('success')}}
    </div>
@endif