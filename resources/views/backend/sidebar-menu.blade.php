<div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Table Filters</a>
    <div class="left-sidebar-spacer">
        <div class="left-sidebar-scroll">
            <div class="left-sidebar-content">
                <ul class="sidebar-elements">
                    <li class="divider">Menu</li>
                <li><a href="{{ Auth::user()->acc_type == '1' ? route('admin') : route('main') }}"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a></li>
                    <li><a href="#"><i class="icon mdi mdi-plus-circle"></i><span>Orders</span></a></li>
                    <li class="parent">
                        <a href="#"><i class="icon mdi mdi-local-dining"></i><span>Restaurants</a>
                        <ul class="sub-menu">
                            @if (Auth::check() && Auth::user()->acc_type == '1') 
                                <li><a href="{{route('restaurants')}}">View Restaurants</a></li>
                            @elseif (Auth::check() && Auth::user()->acc_type == '3')
                                <li><a href="{{route('restaurant')}}">View Restaurant</a></li>
                            @endif
                        </ul>
                    </li>
                    @if (Auth::check() && Auth::user()->acc_type == '3')
                    <li class="parent">
                        <a href="{{route('menu')}}"><i class="icon mdi mdi-pizza"></i><span>Menu</a>
                        <ul class="sub-menu">
                            <li><a href="{{route('menu')}}">View Menu</a></li>
                            <li><a href="{{route('add_menu')}}">Add New Category</a></li>
                        </ul>
                    </li>
                    @endif
                    <li class="parent"><a href="#"><i class="icon mdi mdi-format-list-numbered"></i><span>Food Lists</a>
                        <ul class="sub-menu">
                            @if (Auth::check() && Auth::user()->acc_type == '1') 
                            <li><a href="{{route('admin_foodlist')}}">View List</a></li>
                            @elseif (Auth::check() && Auth::user()->acc_type == '3')
                            <li><a href="{{route('foodlist')}}">View List</a></li>
                            <li><a href="{{ route('add_foodlist') }}">Add To List</a></li>
                            @endif
                        </ul>
                    </li>

                    @if (Auth::check() && Auth::user()->acc_type == '1') 
                    <li class="parent"><a href="#"><i class="icon mdi mdi-globe"></i><span>Locations</a>
                        <ul class="sub-menu">
                            <li><a href="{{route('locations')}}">View Locations</a></li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::check() && Auth::user()->acc_type == '1') 
                        <li class="divider">Admin Options</li>
                        <li class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span>Users</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('users') }}">View All Users</a></li>
                            </ul>
                        </li>
                        <li class="parent"><a href="#"><i class="icon mdi mdi-local-shipping"></i><span>Vendors</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('vendors') }}">View All Vendors</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>