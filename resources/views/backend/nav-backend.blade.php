<nav class="navbar navbar-default navbar-fixed-top be-top-header">
    <div class="container-fluid">
      <div class="navbar-header"><a href="{{ route('main') }}" class="navbar-brand"></a>
      </div>
      <div class="be-right-navbar">
        <ul class="nav navbar-nav navbar-right be-user-nav">
          <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="/assets/img/avatar.png" alt="Avatar"><span class="user-name">  
            @if (Auth::check()) 
              {{ Auth::user()->name }}
            @endif</span></a>
            <ul role="menu" class="dropdown-menu">
              <li>
                <div class="user-info">
                  <div class="user-name">
                    @if (Auth::check()) 
                      {{ Auth::user()->name }}
                    @endif
                  </div>
                  <div class="user-position online">Available</div>
                </div>
              </li>
              <li><a href="#"><span class="icon mdi mdi-face"></span> Account</a></li>
              <li><a href="#"><span class="icon mdi mdi-settings"></span> Settings</a></li>
              <li><a href="{{url('/')}}"><span class="icon mdi mdi-home"></span>View Frontend</a></li>
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  <span class="icon mdi mdi-power"></span> Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
              </li>
            </ul>
          </li>
        </ul>
        <div class="page-title"><span>
          @if (Auth::check()) 
            {{ ucfirst(Auth::user()->name) }}
          @endif
        </span></div>
        <ul class="nav navbar-nav navbar-right be-icons-nav">
          <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
            <ul class="dropdown-menu be-notifications">
              <li>
                <div class="title">Notifications<span class="badge">3</span></div>
                <div class="list">
                  <div class="be-scroller ps-container ps-theme-default" data-ps-id="751ba0c2-e95b-b475-5016-d84f91d348e7">
                    <div class="content">
                      <ul>
                        <li class="notification notification-unread"><a href="#">
                            <div class="image"><img src="/assets/img/avatar2.png" alt="Avatar"></div>
                            <div class="notification-info">
                              <div class="text"><span class="user-name">Jessica Caruso</span> accepted your invitation to join the team.</div><span class="date">2 min ago</span>
                            </div></a></li>
                        <li class="notification"><a href="#">
                            <div class="image"><img src="/assets/img/avatar3.png" alt="Avatar"></div>
                            <div class="notification-info">
                              <div class="text"><span class="user-name">Joel King</span> is now following you</div><span class="date">2 days ago</span>
                            </div></a></li>
                        <li class="notification"><a href="#">
                            <div class="image"><img src="/assets/img/avatar4.png" alt="Avatar"></div>
                            <div class="notification-info">
                              <div class="text"><span class="user-name">John Doe</span> is watching your main repository</div><span class="date">2 days ago</span>
                            </div></a></li>
                        <li class="notification"><a href="#">
                            <div class="image"><img src="/assets/img/avatar5.png" alt="Avatar"></div>
                            <div class="notification-info"><span class="text"><span class="user-name">Emily Carter</span> is now following you</span><span class="date">5 days ago</span></div></a></li>
                      </ul>
                    </div>
                  <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                </div>
                <div class="footer"> <a href="#">View all notifications</a></div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>