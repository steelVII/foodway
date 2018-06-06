<template>
    <keep-alive>
        <section>
            <button class="button is-primary"
                @click="isComponentModalActive = true">
                <span class="icon">
                    <i class="fas fa-sign-in-alt"></i>
                </span>
                <span>Login</span>
            </button>

            <b-modal :active.sync="isComponentModalActive" has-modal-card parent>
                <modal-form :token="getToken" :url="getBaseUrl" :test-url="loginUrl"></modal-form>
            </b-modal>
        </section>
    </keep-alive>
</template>

<script>
    const ModalForm = {
        props:['token','url','testUrl'],
        template: `
            <form method="POST" :action="testUrl">
                <input type="hidden" name="_token" :value="token">
                <div class="modal-card" style="width: auto">
                    <header class="modal-card-head has-text-centered">
                        <img src="/assets/img/logo.png" width="50%" alt="">
                        <p class="modal-card-title">Login</p>
                    </header>
                    <section class="modal-card-body">

                    <div class="buttons is-centered">
                        <a href="/facebook-redirect" class="button is-medium facebook-login">
                            <span class="icon is-small">
                            <i class="fab fa-facebook"></i>
                            </span>
                            <span>Login with Facebook</span>
                        </a>
                    </div>

                    <h5 class="subtitle is-6 has-text-centered">OR</h5>

                    <b-field label="Email">
                        <b-input
                            type="email"
                            placeholder="Your email"
                            name="email"
                            required>
                        </b-input>
                    </b-field>

                    <b-field label="Password">
                        <b-input
                            type="password"
                            password-reveal
                            placeholder="Your password"
                            name="password"
                            required>
                        </b-input>
                    </b-field>

                    <b-checkbox>Remember me</b-checkbox>
                    </section>
                    <footer class="modal-card-foot buttons is-centered">
                        <button class="button is-primary is-medium">                            
                            <span class="icon is-small">
                                <i class="fas fa-sign-in-alt"></i>
                            </span>
                            <span>Login</span>
                        </button>
                        <p class="has-text-centered"><span><a href="/password/reset">Forgot Password?</a></span></p>
                        <p class="has-text-centered"><span>Not a registered user? <a href="/register">Sign Up Here</a></span></p>
                    </footer>
                </div>
            </form>
        `,

    }

    export default {
        components: {
            ModalForm
        },
        data() {
            return {
                isComponentModalActive: false,
            }
        },
        computed: {
            
            getToken: function () {

            let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

            return csrf;

            },

            getBaseUrl: function () {

                let url =  window.location.protocol + "//" + window.location.host;

                return url;

            },
            
            loginUrl: function () {

                let action_url =  window.location.protocol + "//" + window.location.host + "/login";

                return action_url;

            }
        }
    }
</script>