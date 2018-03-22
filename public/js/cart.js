/* $(document).ready(function() {

    $('.cart-button').click( function() {

        if( $('#order-column').hasClass('slide') ) {

        $('#order-column').removeClass('slide');

        }

        else {

        $('#order-column').addClass('slide');

        }

    });

}); */

Vue.component('item-list',{

props: ['orderchit','id'],
template: `

<div>

    <div v-if="orderchit !== 'undefined' && orderchit.length > 0">
        <div class="content columns" v-for="item in orderchit">
            <span class="column is-7">{{item.name}} x {{item.quantity}}</span>
            <div class="column has-text-right">

                <p>RM {{ itemSubtotal(item.price,item.quantity) }}</p>

                <b-tooltip type="is-dark" label="Reduce Item" position="is-left">
                    <span class="minus-button is-primary unset" v-on:click="minusItem(item)"><i class="fas fa-minus-circle"></i></span>
                </b-tooltip>

                <b-tooltip type="is-dark" label="Add Item" position="is-left">
                    <span class="plus-button is-primary unset" v-on:click="addItem(item)"><i class="fas fa-plus-circle"></i></span>
                </b-tooltip>

                <b-tooltip type="is-dark" label="Remove Item" position="is-left">
                    <span class="plus-button is-primary unset" v-on:click="removeItem(item)"><i class="fas fa-times-circle"></i></span>
                </b-tooltip>

            </div>
        </div>
    </div>

    <div v-else>There is nothing for order. Start adding your meals now.</div>

</div>

`,

methods: {

    addItem: function(add){

        add.quantity = add.quantity + 1;
        sessionStorage.setItem('rows', JSON.stringify(this.orderchit));

    },

    minusItem: function(minus){

        minus.quantity = minus.quantity - 1;

        var index = this.orderchit.indexOf(minus);

        if(minus.quantity === 0) {

            this.orderchit.splice(index, 1);

        }

        sessionStorage.setItem('rows', JSON.stringify(this.orderchit));

    },

    removeItem: function(remove){

        var index = this.orderchit.indexOf(remove);

        this.orderchit.splice(index, 1);

        sessionStorage.setItem('rows', JSON.stringify(this.orderchit));

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
                <span>RM {{subtotals(true)}}</span>
            </div>
        </div>

        <div class="columns" v-if="gst() != 0">
            <div class="column is-7">
                <span class="subtitle is-8 has-text-weight-semibold">Inclusive GST (6%)</span>
            </div>
            <div class="column has-text-right">
                <span>RM {{gst('',true)}}</span>
            </div>
        </div>

        <div class="columns" v-if="totals() != 0">
            <div class="column is-7">
                <span class="subtitle is-6 has-text-weight-semibold">Total</span>
            </div>
            <div class="column has-text-right">
                <span>RM {{totals(true)}}</span>
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

//Save Restaurant ID and Items to sessionStorage (For Current Restaurant)
var currentID = sessionStorage.getItem('currentID');
var cartItem = sessionStorage.getItem('rows');

//If this page restaurant ID equals to sessionStorage currentID and cart items is defined or not empty
if(( currentID == thisID ) && (cartItem != null || cartItem != undefined) ){

    var setRows = sessionStorage.getItem('rows');

    new Vue ({

        el: '#app',
        data: {
            rows: JSON.parse(setRows),
            show: false
        },
        methods: {
            addDish: function (item,id) {
        
                // `this` inside methods points to the Vue instance
                var found = false;
                var url = window.location.href;
        
                sessionStorage.setItem('currentID', id);
                sessionStorage.setItem('resURL', url);
        
                for (var i = 0; i < this.rows.length; i++) {
        
                    if (this.rows[i].sku === item.id) {
        
                        this.rows[i].quantity = this.rows[i].quantity + 1;
                        console.log(this.rows)
        
                        found = true;
                        break;
        
                    }
        
                }
        
                //Adds new item if not in order list
                if(!found){
        
                    if(item.sales_price != null) {
        
                        this.rows.push({sku: item.id, name: item.food_name, price: item.sales_price, quantity: 1})
        
                    }
        
                    else {
        
                        this.rows.push({sku: item.id, name: item.food_name, price: item.price, quantity: 1})
                        
                    }
                }

                sessionStorage.setItem('rows', JSON.stringify(this.rows));

            }
        }
        
    });

}

else {

    sessionStorage.removeItem('currentID');
    sessionStorage.removeItem('resURL');
    sessionStorage.removeItem('rows');

    new Vue ({

        el: '#app',
        data: {
            rows: [],
            show: false
        },
        methods: {
            addDish: function (item,id) {
        
                // `this` inside methods points to the Vue instance
                var found = false;
                var url = window.location.href;
        
                sessionStorage.setItem('currentID', id);
                sessionStorage.setItem('resURL', url);
        
                for (var i = 0; i < this.rows.length; i++) {
        
                    if (this.rows[i].sku === item.id) {
        
                        this.rows[i].quantity = this.rows[i].quantity + 1;
                        console.log(this.rows)
        
                        found = true;
                        break;
        
                    }
        
                }
        
                //Adds new item if not in order list
                if(!found){
        
                    if(item.sales_price != null) {
        
                        this.rows.push({sku: item.id, name: item.food_name, price: item.sales_price, quantity: 1})
        
                    }
        
                    else {
        
                        this.rows.push({sku: item.id, name: item.food_name, price: item.price, quantity: 1})
                        
                    }

                }

                sessionStorage.setItem('rows', JSON.stringify(this.rows));

            }
        }
        
        });

}