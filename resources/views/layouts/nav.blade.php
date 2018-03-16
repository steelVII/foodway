<div class="nav-wrapper @if(Request::is('/'))
nav-wrapper-fixed @endif">
<nav class="navbar is-transparent @if(Request::is('/')) is-fixed-top @endif">

  <div class="container">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{url('/')}}"><img src="/assets/img/logo.png" alt=""></a>
      <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  
    <div id="navbarExampleTransparentExample" class="navbar-menu" v-cloak>
      <div class="navbar-end">
        <a class="navbar-item" href="{{url('/')}}">
          Home
        </a>
        <a href="{{ route('front_restaurants') }}" class="navbar-item">Restaurants</a>

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link" href="#">
              Orders <badge-quantity :badge="rows"></badge-quantity>
            </a>
            <div class="navbar-dropdown is-boxed is-right" style="width:320px;">
                <div class="container spacing">

                        <div id="cart" class="content">

                            <h3>Order</h3>

                            <hr>

                            <item-list :orderchit="rows"></item-list>

                            <div class="hide" v-if="rows !== 'undefined' && rows.length > 0">
                                <hr v-cloak>
                            </div>

                            <total-item :full="rows"></total-item>

                        </div>

                 </div>
            </div>
          </div>

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

        <div class="navbar-item">
            <div class="field is-grouped">
              <p class="control">
                <a class="button is-primary" href="{{ route('login') }}">
                  <span class="icon">
                    <i class="fas fa-sign-in-alt"></i>
                  </span>
                  <span>Login</span>
                </a>
              </p>
            </div>
          </div>
      </div>

      @endif

    </div>
  </div>
  </nav>
</div>