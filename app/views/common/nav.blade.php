<nav id="nav" role="navigation">

  <ul>
    <li>
      <a class="btn btn-lg btn-default" href="{{URL::route('home')}}">
        <i class="fa fa-home"></i>
      </a>
    </li>
    <li>
        <a class="btn btn-lg btn-default" href="{{URL::route('create-homework')}}">
          <i class="fa fa-plus"></i></i>

        </a>
    </li>


    <li><a class="btn btn-lg btn-default" href="{{URL::route('account')}}"><i class="fa fa-cog"></i></a></li>
    <li><a class="btn btn-lg btn-default" href="{{URL::route('logout')}}"><i class="fa fa-sign-out"></i></a></li>


    <li>
      <a href="{{URL::route('admin-dashboard')}}" class="btn btn-default btn-lg">
        <i class="fa fa-tachometer"></i>
      </a>
    </li>
  </ul>
</nav>
