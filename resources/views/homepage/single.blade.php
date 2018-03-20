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

                                <div class="content rm-margin">

                                    <h3>{{ $single->restaurant_name }}</h3>

                                    <restaurants :test="{{ $single }}"></restaurants>

                                </div>

                            </div>

                        </div>

                        <hr>

                        <div class="container is-fluid">

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
                                                    <i v-on:click="addDish({{$menuitem}})" class="far fa-plus-square"></i>
                                                    </div>
                                                </div>                

                                        @endif
                                    
                                @endforeach

                            </div>

                        </div>
                        
                        @endforeach

                    </div>
                            
                    </div>

                    <div class="cart-button button"><i class="fas fa-list"></i> Orders</div>

                    <div id="order-column" class="column is-one-quarter padding-lf-0">

                        <div class="container spacing">

                                <div class="cart-button inner button is-primary"><i class="fas fa-times-circle"></i> Close</div>

                            <div class="box">
                                <div class="content">

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
                </div>
            </div>

</div>

@endsection

@section('cart')

<script>

$(document).on('click','.cart-button', function() {

    if( $('#order-column').hasClass('test') ) {

    $('#order-column').removeClass('test');

    }

    else {

    $('#order-column').addClass('test');

    }

});


    var sticky = new Sticky('.selector');

    Vue.component('badge-quantity',{

        props: ['badge'],
        template: `
        
            <div>
            
                <div class="badge">@{{quantity}}</div>

            </div>

        
        `,

        computed: {

            quantity: function() {

                let quantity = 0;

                for(var index = 0; index < this.badge.length; index++) {

                quantity += this.badge[index].quantity;

                }

                return quantity;

            }


        }


    });

    Vue.component('item-list',{

    props: ['orderchit'],
    template: `

    <div>

        <div v-if="orderchit !== 'undefined' && orderchit.length > 0">
            <div class="content columns" v-for="item in orderchit">
                <span class="column is-7">@{{item.name}} x @{{item.quantity}}</span>
                <div class="column has-text-right">
                    <p>RM @{{ itemSubtotal(item.price,item.quantity) }}</p>
                    <span class="is-primary is-outlined" v-on:click="minusItem(item)"><i class="fas fa-minus-circle"></i></span>
                    <span class="is-primary" v-on:click="addItem(item)"><i class="fas fa-plus-circle"></i></span>
                </div>
            </div>
        </div>

        <div v-else>There is nothing for order. Start adding your meals now.</div>

    </div>

    `,

    methods: {

        addItem: function(add){

            add.quantity = add.quantity + 1;

        },

        minusItem: function(minus){

            minus.quantity = minus.quantity - 1;

            var index = this.orderchit.indexOf(minus);

            if(minus.quantity === 0) {

                this.orderchit.splice(index, 1);

            }

        },

        itemSubtotal: function(price,quantity){

            let sub = 0;

            sub = price * quantity;

            sub = Math.round(sub * 100) / 100;

            return sub.toFixed(2);

        }
    },

});

Vue.component('total-item',{

    props: ['full'],

    template: `
    
        <div class="totals content">
            <div class="columns" v-if="subtotals() != 0">
                <div class="column is-7">
                    <span class="subtitle is-7 has-text-weight-semibold">Subtotal</span>
                </div>
                <div class="column has-text-right">
                    <span>RM @{{subtotals(true)}}</span>
                </div>
            </div>

            <div class="columns" v-if="gst() != 0">
                <div class="column is-7">
                    <span class="subtitle is-8 has-text-weight-semibold">Inclusive GST (6%)</span>
                </div>
                <div class="column has-text-right">
                    <span>RM @{{gst('',true)}}</span>
                </div>
            </div>

            <div class="columns" v-if="totals() != 0">
                <div class="column is-7">
                    <span class="subtitle is-6 has-text-weight-semibold">Total</span>
                </div>
                <div class="column has-text-right">
                    <span>RM @{{totals(true)}}</span>
                </div>
            </div>
        </div>
    
    `,

    methods: {

            subtotals: function(isDisplay) {

                var subtotals = 0;

                for(var index = 0; index < this.full.length; index++) {

                    subtotals += this.full[index].price * this.full[index].quantity;

                    subtotals = Math.round(subtotals * 100) / 100;
                    
                }

                if(isDisplay == true) {

                    return subtotals.toFixed(2);

                }

                return subtotals;

                },

            gst: function(calsub,isDisplay){

                 let gst = this.subtotals(false) * 0.06;

                 gst = Math.round(gst * 100) / 100;

                 if(isDisplay == true) {

                    return gst.toFixed(2);

                 }

                 return gst;

            },

            totals: function(isDisplay) {

                var totals = 0;

                totals = this.subtotals(false) + this.gst(this.subtotals(false), false);

                totals = Math.round(totals * 100) / 100;

                if(isDisplay == true) {

                    return totals.toFixed(2);

                }

                return totals;

            }

    }

});

new Vue ({

    el: '#app',
    data: {
        rows: []
    },
    methods: {
        addDish: function (item) {
        // `this` inside methods points to the Vue instance
        var found = false;

            for (var i = 0; i < this.rows.length; i++) {

                if (this.rows[i].sku === item.id) {

                    this.rows[i].quantity = this.rows[i].quantity + 1;
                    console.log(this.rows)

                    found = true;
                    break;

                }

            }

            if(!found){

                if(item.sales_price != null) {

                    this.rows.push({sku: item.id, name: item.food_name, price: item.sales_price, quantity: 1})

                }

                else {

                    this.rows.push({sku: item.id, name: item.food_name, price: item.price, quantity: 1})

                }
            }
        }
    }

});

</script>
    
@endsection