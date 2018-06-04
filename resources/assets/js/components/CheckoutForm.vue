<template>
    <section>
        <div class="shipping">
            <h3 class="title is-4">Shipping Details</h3>

            <b-field>
                <b-input placeholder="Name" type="text" name="shipping_name" :value="details.name" required></b-input>
            </b-field>

            <b-field>
                <b-input placeholder="Phone Number" type="tel" name="shipping_phone_number" :value="details.phone_number" required></b-input>
            </b-field>

            <b-field>
                <b-input placeholder="Email" type="email" name="shipping_email" :value="details.email" required></b-input>
            </b-field>

            <b-field label="Select time">
                <b-timepicker
                    rounded
                    placeholder="Select when should the order be delivered..."
                    icon="clock"
                    :hour-format="12"
                    name="delivery_time" required>
                </b-timepicker>
            </b-field>

                <b-field>
                    <b-input type="textarea"
                    minlength="10"
                    maxlength="100"
                    placeholder="Shipping Address" name="shipping_address" :value="details.address" required>
                </b-input>
            </b-field>

            <div class="field"> 
                <b-checkbox v-model="billing">Different Billing Address?</b-checkbox>
            </div>

        </div>

        <hr v-if="billing">

        <div v-if="billing" class="billing">
            <h3 class="title is-4">Billing Details</h3>

            <b-field>
                <b-input placeholder="Name" type="text" name="billing_name"></b-input>
            </b-field>

            <b-field>
                <b-input placeholder="Phone Number" type="tel" name="billing_phone_number"></b-input>
            </b-field>

            <b-field>
                <b-input placeholder="Email" type="email" name="billing_email"></b-input>
            </b-field>

            <b-field>
                <b-input type="textarea"
                    minlength="10"
                    maxlength="100"
                    placeholder="Billing Address" name="billing_address">
                </b-input>
            </b-field>
        </div>

                        <div class="content" style="margin-top:32px;">
                    <h3 class="title is-4 has-text-weight-semibold">Payment</h3>
                    <div class="block">
                            <b-field>
                                <b-radio v-model="radio" native-value="Paypal" name="payment_method">
                                    Paypal
                                </b-radio>
                            </b-field>
                            <b-field>
                                <b-radio v-model="radio" native-value="BillPlz" name="payment_method">
                                    BillPlz
                                </b-radio>
                            </b-field>
                            <b-field>
                                <b-radio v-model="radio" native-value="Cash on Delivery" name="payment_method">
                                    Cash on Delivery
                                </b-radio>
                            </b-field>
                        </div>
                </div>
    </section>
    
</template>

<script>
    export default {
        props: ['info'],
        data() {
            return {
                billing: false,
                radio: '1',
                formatAmPm: true,
                details: this.info
            }
        }
    }
</script>