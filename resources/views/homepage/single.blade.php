@extends ('layouts.master')

@section('navi')

    @include ('layouts.nav')
    
@endsection


@section('content')

<div id="app" class="has-content">

            <div class="content">
                <div class="columns" style="position:relative;">
                    <div class="column padding-rg-0">

                        <div class="card">

                            <div class="cover-img" style="background-image: url({{ asset('storage/'.$single->restaurant_image) }})">

                            </div>

                            <div class="card-content">

                                    <div class="columns">
                                        <div class="column is-2" style="background:#000;"></div>
                                        <div class="column">
                                            <h3>{{ $single->restaurant_name }}</h3>
                                            <span>{{ $single->address }}</span>
                                        </div>
                                        <div class="column is-6">
                                            <restaurants :res-info="{{ $single }}"></restaurants>
                                        </div>
                                    </div>

                            </div>

                        </div>

                        <hr>

                        <div class="container is-fluid">

                        <h2>Menu</h2>

                        @foreach ($menu_cat as $cat)
                        
                        <div class="category-holder">

                            <div class="content">

                                <h3>{{$cat}}</h3>

                                @foreach ($menu as $menuitem)

                                        @if ($cat == $menuitem->food_categories)

                                                <div class="columns box">
                                                <!-- <div class="column is-3">
                                                    <img src="{{ asset('storage/foods/'.$menuitem->food_image) }}" alt="">
                                                </div> -->
                                                    <div class="column">
                                                        <h5>{{$menuitem->food_name}}</h5>
                                                        <p class="is-6">{{ $menuitem->description }}</p>
                                                    </div>
                                                    <div class="column is-2 is-offset-2 has-text-centered">
                                                        @if ($menuitem->sales_price)
                                                            <span class="is-4 promo">RM {{$menuitem->price}}</span>
                                                            <span class="is-4">RM {{$menuitem->sales_price}}</span>
                                                        @else
                                                            <span class="is-4">RM {{$menuitem->price}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="column is-2 has-text-centered">
                                                    <i v-on:click="addDish({{$menuitem}},{{ $single->id }})" class="far fa-plus-square"></i>
                                                    </div>
                                                </div>                

                                        @endif
                                    
                                @endforeach

                            </div>

                        </div>
                        
                        @endforeach

                    </div>
                            
                    </div>

                    <div class="cart-button button" v-on:click="show = !show"><i class="fas fa-shopping-basket"></i> Orders <badge-quantity :badge="rows"></badge-quantity></div>
                    <transition name="slide" v-cloak>
                    <div v-if="show" id="order-column" class="column is-3 padding-lf-0">

                        <div class="container spacing">

                                <div v-on:click="show = !show" class="cart-button inner button is-primary"><i class="fas fa-times-circle"></i> Close</div>

                            <div class="">
                                <div class="content hold">

                                    <h3>Order</h3>

                                    <hr>

                                    <item-list :orderchit="rows"></item-list>

                                    <div class="hide" v-if="rows !== 'undefined' && rows.length > 0">
                                        <hr v-cloak>
                                    </div>

                                    <total-item :full="rows"></total-item>

                                    <div class="hide has-text-centered" v-if="rows !== 'undefined' && rows.length > 0">
                                        <a href="" class="checkout-button button is-primary is-outlined is-medium unset">Checkout</a>
                                    </div>

                                </div>
                            </div>

                         </div>

                    </div>
                </transition>
                </div>
            </div>

</div>

@endsection

@section('cart')

<script>

var singleInfo = {!! json_encode($single->toArray()) !!};
var thisID = singleInfo.id;

</script>

<script src="/js/cart.js" type="text/javascript"></script>
    
@endsection