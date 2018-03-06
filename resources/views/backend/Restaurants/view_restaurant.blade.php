@extends ('backend.backendmaster') 

@section('content') 
    <div class="row">
            <div class="col-md-12">
                <div class="panel panel-flat">
                    <div class="single-restaurant panel-cover-image">
                        <img src="{{ asset('storage/'.$restaurant->restaurant_image) }}" alt="">
                    </div>

                    <div class="panel-heading">
                        
                        <div class="row">
                            <div class="col-md-4">
                                <h2 class="page-head-title">{{$restaurant->restaurant_name}}</h2>
                            </div>
                            <div class="col-md-8 text-right">
                                @if (Auth::check() && Auth::user()->acc_type == '3')
                                    <a href="{{ route('edit_restaurant') }}" class="btn btn-success mr-auto">Edit Restaurant</a>
                                @endif
                            </div>
                        </div>
                        
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h4><i class="icon mdi mdi-home"></i> Address</h4>
                                <span>{{ $restaurant->address }}</span>
                            </div>
                            <div class="col-md-4">
                                <h4><i class="icon mdi mdi-email"></i> Email</h4>
                                <p>{{ $restaurant->email }}</p>
                            </div>
                            <div class="col-md-4">
                                <h4><i class="icon mdi mdi-phone"></i> Phone number</h4>
                                <span>{{ $restaurant->phone_num }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h4><i class="icon mdi mdi-pizza"></i> Category</h4>
                                <p>{{ $restaurant->food_categories }}</p>
                            </div>
                            <div class="col-md-4">
                                <h4><i class="icon mdi mdi-time"></i> Opening Hours</h4>
                                <p>{{ $restaurant->opening_hours }}</p>
                            </div> 
                            <div class="col-md-4">
                                <h4><i class="icon mdi mdi-time"></i> Closing Hours</h4>
                                <span>{{ $restaurant->closing_hours }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

<div class="row">

    <div class="text-center"><h2>Menu</h2></div>

    <div class="menu-items-holder">
                                            @if (Auth::check() && Auth::user()->acc_type == '1')

                                            @foreach ($menu_cat as $cat)
                                            <h3>{{ $cat }}</h3>
                                            <div class="cat-holder">
                                                @foreach ($menu as $menuitem)
                                                @if ($cat == $menuitem->food_categories)
                                                <div class="col-md-12" data-id="{{ $menuitem->id }}">
                                                        <div class="panel panel-flat">
                                                            <div class="row no-margin">
                                                                @if($menuitem->food_image != null)
                                                                    <div class="item-img col-md-3" style="background: url({{ asset('storage/foods'.$menuitem->food_image) }}) 100%/cover no-repeat;">
                                                                    </div>
                                                                @endif
                                                                <div class="panel-body col-md-9">
                                                                    <div class="row">
                                                                        <div class="col-md-8"><div class="panel-heading no-margin">{{ $menuitem->food_name }}</div></div>
                                                                        <div class="col-md-4 text-right"></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12"><p>Lorem Ipsum.</p></div>
                                                                    </div>
                                                                    <div class="row">
                                                                    
                                                                        @if($menuitem->sales_price != null)

                                                                            <div class="col-md-4"><s>RM {{ $menuitem->price }}</s> <span class="price"> RM {{ $menuitem->sales_price }}</span></div>

                                                                        @else

                                                                            <div class="col-md-4"><p class="price">RM {{ $menuitem->price }}</p></div>

                                                                        @endif

                                                                        <div class="col-md-4"><p>{{ $menuitem->food_categories }}</p></div>
                                                                        <div class="col-md-4 text-right">
                                                                                <a href="food_list/{{ $menuitem->id }}" class="btn btn-primary">Edit</a>
                                                                        </div>

                                                                    </div>                                                         
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                                </div>
                                            @endforeach
                                            @else
                                            @foreach ($menu_cat as $cat)
                                            <h3>{{ $cat }}</h3>
                                            <div class="cat-holder" id="testo">
                                                @foreach ($menu as $menuitem)
                                                @if ($cat == $menuitem->food_categories)
                                                <div class="col-md-12" data-id="{{ $menuitem->id }}">
                                                        <div class="panel panel-flat">
                                                            <div class="row no-margin">
                                                                @if($menuitem->food_image != null)
                                                                    <div class="item-img col-md-3" style="background: url({{ asset('storage/foods'.$menuitem->food_image) }}) 100%/cover no-repeat;">
                                                                    </div>
                                                                @endif
                                                                <div class="panel-body col-md-9">
                                                                    <div class="row">
                                                                        <div class="col-md-8"><div class="panel-heading no-margin">{{ $menuitem->food_name }}</div></div>
                                                                        <div class="col-md-4 text-right"><i class="icon mdi mdi-swap-vertical my-handle"></i></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12"><p>Lorem Ipsum.</p></div>
                                                                    </div>
                                                                    <div class="row">
                                                                    
                                                                        @if($menuitem->sales_price != null)

                                                                            <div class="col-md-4"><s>RM {{ $menuitem->price }}</s> <span class="price"> RM {{ $menuitem->sales_price }}</span></div>

                                                                        @else

                                                                            <div class="col-md-4"><p class="price">RM {{ $menuitem->price }}</p></div>

                                                                        @endif

                                                                        <div class="col-md-4"><p>{{ $menuitem->food_categories }}</p></div>
                                                                        <div class="col-md-4 text-right">
                                                                                <a href="food_list/{{ $menuitem->id }}" class="btn btn-primary">Edit</a>
                                                                        </div>

                                                                    </div>                                                         
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                                </div>
                                                @endforeach
                                            @endif
    </div>
</div>
@endsection
