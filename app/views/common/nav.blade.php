<nav id="nav" role="navigation">
  <div id="logo" class="text-center">
    <img src="{{URL::asset('images/huiswerk-logo.png')}}" alt="Huiswerk Inator Logo">
   </div>
  <ul>
    <li>
      <a class="btn btn-info" href="{{URL::route('home')}}">
        <i class="fa fa-home"></i>
      </a>
    </li>
    <li>
        <a id="nav-homework" class="btn btn-info" href="{{URL::route('create-homework')}}">
          <i class="fa fa-plus"></i></i>

        </a>
    </li>


    <li><a id="nav-settings" class="btn btn-info" href="{{URL::route('account')}}"><i class="fa fa-cog"></i></a></li>
    <li><a id="nav-logout" class="btn btn-info" href="{{URL::route('logout')}}"><i class="fa fa-sign-out"></i></a></li>


    <li>
      <a href="{{URL::route('admin-dashboard')}}" class="btn btn-primary">
        <i class="fa fa-tachometer"></i>
      </a>
    </li>
  </ul>
</nav>
