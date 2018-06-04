<template>
    <b-table
        :data="info"
        paginated
        per-page="5"
        default-sort="date"
        :default-sort-direction="defaultSortDirection"
        :opened-detailed="defaultOpenedDetails"
        detailed
        detail-key="id"
        @details-open="(row, index) => $toast.open(`Expanded #${row.order_id}`)"
    >

        <template slot-scope="props">
            <b-table-column field="id" label="Order ID" numeric>
                #{{ props.row.order_id }}
            </b-table-column>

            <b-table-column field="restaurant_name" label="Restaurant Name" sortable>
                {{ props.row.restaurant_name }}
            </b-table-column>

            <b-table-column field="total" label="Total">
                {{ props.row.total }}
            </b-table-column>

            <b-table-column field="payment_method" label="Payment Method" sortable>
                {{ props.row.payment_method }}
            </b-table-column>

            <b-table-column field="order_status" label="Order Status" sortable centered>
                <span v-if="props.row.order_status == 'Delivered'" class="tag is-success">
                    {{ props.row.order_status }}
                </span>
                <span v-else class="tag is-danger">
                    {{ props.row.order_status }}
                </span>
            </b-table-column>

             <b-table-column field="date" label="Date" sortable centered>
                <span class="tag is-success">
                    {{ new Date(props.row.created_at).toLocaleDateString() }}
                </span>
            </b-table-column>

        </template>

        <template slot="detail" slot-scope="props">
            <ul id="example-1" v-html="parseItems( props.row.dish_items )">
                
            </ul>
        </template>
    </b-table>
</template>

<script>
    export default {
        props: ['orderInfo'],
        methods: {

            parseItems: function(items) {

                var dishItems = JSON.parse(items);
                var test = "";

                dishItems.forEach(element => {
                   test +=  "<li>" + element.name + "x" + element.quantity + "</li>";
                });

                return test;
                
            }

        },
        data() {
            return {
                info: this.orderInfo,
                defaultOpenedDetails: [1],
                defaultSortDirection: 'desc'
            }
        }
    }
</script>