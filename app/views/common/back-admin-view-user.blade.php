@if(isset($user))

<p>
  <a class="btn btn-default" href="{{URL::route('admin-users.show', [$user->id])}}">
        <i class="fa fa-chevron-left"></i>
        Terug naar bekijken {{$user->fullname}}
    </a>
</p>

@endif
