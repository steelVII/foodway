<div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Table Filters</a>
    <div class="left-sidebar-spacer">
        <div class="left-sidebar-scroll">
            <div class="left-sidebar-content">
                <ul class="sidebar-elements">
                    <li class="divider">Menu</li>
                    <li><a href="{{url('admin')}}"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="parent"><a href="#"><i class="icon mdi mdi-local-dining"></i><span>Restaurants</a>
                        <ul class="sub-menu">
                             <li><a href="{{route('restaurants')}}">View Restaurants</a></li>
                            <li><a href="{{route('add_restaurant')}}">Add New Restaurant</a></li>
                        </ul>
                    </li>
                    <li class="parent"><a href="#"><i class="icon mdi mdi-pizza"></i><span>Food Categories</a>
                        <ul class="sub-menu">
                             <li><a href="{{route('foodcategories')}}">View Categories</a></li>
                            <li><a href="{{ route('add_foodcategories') }}">Add New Category</a></li>
                        </ul>
                    </li>
                    <li class="divider">Admin Options</li>
                    <li class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span>Users</span></a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('users') }}">View All Users</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>