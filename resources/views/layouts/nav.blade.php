<div class="nav-wrapper @if(Request::is('/'))
nav-wrapper-fixed @endif">
<nav class="navbar is-transparent @if(Request::is('/')) is-fixed-top @endif">

  <div class="container">
    <div class="navbar-brand">
      <a class="navbar-item" href="{{url('/')}}"><img src="/assets/img/logo.png" alt=""></a>
      @if (Auth::check())
        @if (!Request::is('restaurant/*')) 

          <link-restaurant class="navbar-item is-hidden-desktop" style="margin-left: auto;"></link-restaurant>

        @else

          <a v-cloak v-on:click="show = !show" class="navbar-item is-hidden-desktop" style="margin-left: auto;" href="#">
              <i class="fas fa-shopping-basket"></i> <badge-quantity :badge="rows"></badge-quantity>
          </a>

        @endif
        <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>

      @else
        <modal-login class="navbar-item is-hidden-desktop" style="margin-left: auto;"></modal-login>
      @endif

    </div>
  
    <div id="navMenu" class="navbar-menu" v-cloak>
      <div class="navbar-end">
        <a class="navbar-item" href="{{url('/')}}">
          Home
        </a>
        <!-- <a href="{{--route('front_restaurants')--}}" class="navbar-item">Restaurants</a> -->

        @if (!Request::is('restaurant/*')) 

          <link-restaurant class="is-hidden-mobile">></link-restaurant>

        @else

          <a v-cloak v-on:click="show = !show" class="navbar-item is-hidden-mobile" href="#">
              <i class="fas fa-shopping-basket"></i> <badge-quantity :badge="rows"></badge-quantity>
          </a>

        @endif

        @if (Auth::check())
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link" href="#">
            {{ Auth::user()->name }}
          </a>
          <div class="navbar-dropdown is-boxed">
              @if (Auth::user()->acc_type == '1')
              <a class="navbar-item" href="{{ route('admin') }}">Dashboard</a>
              <div class="dropdown-divider"></div>
              @elseif (Auth::user()->acc_type == '3')
              <a class="navbar-item" href="{{ route('main') }}">Dashboard</a>
              <div class="dropdown-divider"></div>
              @else
              <a class="navbar-item" href="{{ route('customer_dashboard') }}">Dashboard</a>
              <div class="dropdown-divider"></div>
              @endif
              <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                      Logout
                    </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
          </div>
        </div>

        @else

        <div class="navbar-item is-hidden-mobile">
          <div class="field is-grouped">
            <p class="control">
              <modal-login></modal-login>
            </p>
          </div>
        </div>
      </div>

      @endif

    </div>
  </div>
  </nav>
</div>