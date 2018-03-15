<template>
    <section>
        <b-tabs v-model="activeTab">
            <b-tab-item label="Info">
                <div class="content">
                    <div class="columns">
                        <div class="column">
                            <h5 class="is-primary"><i class="fas fa-home"></i> Address</h5>
                            <p>{{info.address}}</p>
                        </div>
                        <div class="column">
                            <h5><i class="fas fa-envelope"></i> Postcode</h5>
                            <p>{{info.postcode}}</p>                       
                        </div>
                        <div class="column">
                            <h5><i class="fas fa-phone"></i> Phone Number</h5>
                            <p>{{info.phone_num}}</p>
                        </div>
                    </div>
                </div>
            </b-tab-item>

            <b-tab-item label="Operation Hours">
                <div class="content">
                    <div class="columns">
                        <div class="column">
                            <h4>Opening Hours</h4>
                            <span>{{info.opening_hours}}</span>
                        </div>
                        <div class="column">
                            <h4>Closing Hours</h4>
                            <span>{{info.closing_hours}}</span>
                        </div>
                    </div>
                </div>

            </b-tab-item>
            
        </b-tabs>
    </section>
</template>

<script>
    export default {
        props: ['test'],
        data() {
            return {
                activeTab: 0,
                info: this.test
            }
        }
    }
</script>