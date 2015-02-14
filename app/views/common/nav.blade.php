<nav class="pushy pushy-left">
  <ul>
    <li>
      <a href="{{URL::route('home')}}">
        <i class="fa fa-home"></i>
        Home
      </a>
    </li>
    <li>
      <a id="nav-settings" href="{{URL::route('account')}}">
        <i class="fa fa-cog"></i>
        Account
      </a>
    </li>
    <li><a id="nav-logout" href="{{URL::route('logout')}}">
        <i class="fa fa-sign-out"></i>
        Uitloggen
      </a>
    </li>
    @if( Auth::check() && Auth::user()->has('admin') )
      <li>
        <a href="{{URL::route('admin-dashboard')}}">
          <i class="fa fa-tachometer"></i>
          Admin
        </a>
      </li>
    @endif
  </ul>
</nav>

<div class="site-overlay"></div>

<div class="navigation-bar">
  <div class="menu-btn-wrap">
    <a class="menu-btn">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  <div class="logo-wrap">
    <a href="{{{URL::route('home')}}}">

      <i class="fa fa-graduation-cap"></i>
      Huiswerk Inator
    </a>
  </div>
  <div class="create-homework-wrap">
    <a href="{{URL::route('create-homework')}}" class="add-btn">
      <i class="fa fa-plus"></i>
    </a>
  </div>
</div>