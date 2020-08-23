<template>
    <div class="message-panel-test teal lighten-2" :class="signIn !== 0 ? 'exchange-message-panel' : ''">
        <div id="inner-container-message-panel">
            <div id="container-message-title">
                <h3 class="center" id="message-title" v-text="activeButtonForm[signIn].message.title"></h3>
                <div id="inner-container-message-body">
                    <p class="center" v-text="activeButtonForm[signIn].message.body" style="font-size: 1.2rem;"></p>
                </div>
            </div>
            <div id="container-message-button">
                <template v-if="signIn !== 0">
                    <button class="btn waves-effect waves-light btn-form-action" @click="toRegisterForm">
                        <span>Sign up</span>
                    </button>
                </template>
                <template v-else>
                    <button class="btn waves-effect waves-light btn-form-action" @click="toLoginForm">
                        <span>Sign in</span>
                    </button>
                </template>
<!--                <button class="btn waves-effect waves-light" name="action" @click="changePanel" style="width: 100%; border-radius: 100px;">-->
<!--                    <span v-text="activeButtonForm[signIn].messageButton"></span>-->
<!--                </button>-->
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState, mapMutations, mapActions} from 'vuex'

    export default {
        name: "message-panel",
        data() {
            return {
                activeButtonForm: [
                    { messageButton: 'Sing in',
                        message: {
                            title: 'Welcome back',
                            body: 'To keep connected with us please login with your personal info'
                        }
                    },
                    { messageButton: 'Sing up',
                        message: {
                            title: 'Hello Friend',
                            body: 'Enter your personal details and start journey with us'
                        }
                    }
                ],
            }
        },
        computed: {
            ...mapState('formPanels', ['signIn'])
        },
        methods: {
            // ...mapMutations('formPanels', ['changePanel']),
            toLoginForm() {
                this.$store.formPanels.dispatch('loginAction')
            },
            toRegisterForm() {
                this.$store.formPanels.dispatch('registerAction')
            }
        },
        actions: {
            ...mapActions('formPanels', ['loginAction', 'registerAction'])
        }
    }
</script>

<style scoped>
    .message-panel {
        width: 350px;
        height: 450px;
        padding: 0;
        margin: 0;
        position: absolute;
        left: 0px;
        transition-duration: 0.7s;
        z-index: 9999;
    }

    .message-panel-test {
        width: 40%;
        height: calc(100% - 64px);
        padding: 0;
        margin: 0;
        position: absolute;
        left: 0px;
        transition-duration: 0.7s;
        z-index: 9999;
    }

    #inner-container-message-panel {
        width: 100%;
        position: relative;
        top: 25%;
    }

    #inner-container-message-body {
        padding-bottom: 20px;
    }

    #container-message-title {
        max-width: 300px;
        margin: 0 auto;
    }

    #message-title, #inner-container-message-body p {
        color: #fff;
        font-weight: 700;
    }

    #container-message-button {
        width: 100px;
        margin: 0 auto;
    }

    .btn-form-action {
        width: 100%;
        border-radius: 100px;
    }

    .exchange-message-panel {
        transition-duration: 0.7s;
        left: calc(100% - 40%);
        z-index: 9999;
    }

    /* .message-panel-test {
        min-width: 400px;
    } */

    @media only screen and (max-width: 768px) {
        .message-panel-test {
            width: 100%;
            height: 215px;
            padding: 0;
            margin: 0;
            position: absolute;
            top: 64px;
            transition-duration: 0.7s;
            z-index: 9999;
        }

        .exchange-message-panel {
            top: 394px;
            left: 0;
            transition-duration: 0.7s;
        }

        #inner-container-message-panel {
            width: 100%;
            height: inherit;
            top: 0;
        }

        #container-message-title {
            max-width: 300px;
            margin: 0 auto;
        }

        #message-title {
            color: #fff;
            font-weight: 700;
            margin-bottom: 0 !important;
        }

        #inner-container-message-body {
            width: 80%;
            margin: 0 auto;
            padding-top: 10px;
        }

        #inner-container-message-body p {
            color: #fff;
        }

        #container-message-button {
            width: 100px;
            margin: 0 auto;
        }

        .message-panel-test {
            min-width: 400px !important;
        }
    }
</style>
