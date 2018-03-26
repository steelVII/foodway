<template>
    <section>
        <div class="shipping">
            <h3 class="title is-4">Shipping Details</h3>

            <b-field>
                <b-input placeholder="Name" type="text" name="test"></b-input>
            </b-field>

            <b-field>
                <b-input placeholder="Phone Number" type="tel"></b-input>
            </b-field>

            <b-field>
                <b-input placeholder="Email" type="email"></b-input>
            </b-field>

            <b-field>
                <b-input type="textarea"
                    minlength="10"
                    maxlength="100"
                    placeholder="Shipping Address">
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
                <b-input placeholder="Email" type="email"></b-input>
            </b-field>

            <b-field>
                <b-input placeholder="Phone Number" type="tel"></b-input>
            </b-field>

            <b-field>
                <b-input placeholder="Number"
                    type="number"
                    min="10"
                    max="20">
                </b-input>
            </b-field>

            <b-field>
                <b-input placeholder="URL" type="url"></b-input>
            </b-field>

            <b-field>
                <b-input type="textarea"
                    minlength="10"
                    maxlength="100"
                    placeholder="Maxlength automatically counts characters">
                </b-input>
            </b-field>
        </div>
    </section>
    
</template>

<script>
    export default {
        data() {
            return {
                billing: false
            }
        }
    }
</script>