<template>
    <div class="form-panel-test teal lighten-5" :class="signIn != 0 ? 'exchange-form-panel' : ''">
        <div id="inner-container-form-panel">
            <div style="max-width: 350px; margin: 0 auto;">
                <h3 class="center" id="form-title" v-text="FormInfo[signIn].sign.title"></h3>
                <div style="width: 100%; margin: 0 auto; padding-top: 10px;">
                    <form class="col s12" style="padding-top: 0;">
                        <div class="row" v-if="signIn != 1" style="margin-bottom: 5px;">
                            <div class="input-field col s12" style="margin: 0;">
                                <input class="validate" v-model="form.name" type="text" name="name" required>
                                <label>Name</label>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 5px;">
                            <div class="input-field col s12" style="margin: 0;">
                                <input class="validate"
                                    v-model="form.email"
                                    v-on:keyup.delete="hideMessageError"
                                    type="email" name="email" required>
                                <label>Email</label>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="input-field col s12" style="margin: 0;">
                                <input class="validate"
                                    v-model="form.password"
                                    v-on:keyup.delete="hideMessageError"
                                    type="password" name="password" required>
                                <label>Password</label>
                            </div>
                        </div>
                        <!-- <div class="row" v-if="signIn != 1" style="margin-bottom: 20px;">
                            <div class="input-field col s12" style="margin: 0;">
                                <input class="validate"
                                    v-model="form.confirm_password"
                                    v-on:keyup.delete="hideMessageError"
                                    type="password" name="confirm_password" required>
                                <label>Confirm Password</label>
                            </div>
                        </div> -->
                        <div class="row" v-if="error" style="margin-bottom: 10px;">
                            <div class="col s12" style="display: flex;">
                                <i class="material-icons">error_outline</i><p class="left" style="font-size: .95rem; font-weight: 500; color: #f44336">{{ authError }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="center" style="margin: 0;">
                                <button class="btn waves-effect waves-light center" id="btn-login" @click.prevent="controlAccess()">
                                    <div :class="loader == true ? 'preloader-wrapper small active preloader-on' : ''">
                                        <div class="spinner-layer" style="border-color: white !important">
                                            <div class="circle-clipper left">
                                                <div class="circle"></div>
                                            </div><div class="gap-patch">
                                                <div class="circle"></div>
                                            </div><div class="circle-clipper right">
                                                <div class="circle"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-form-action" :class="loader == true ? 'login-off' : 'login-on'">
                                        <span v-text="FormInfo[signIn].sign.messageButton"></span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import {login, register} from '../../helpers/auth'
    import {mapState} from 'vuex'

    export default {
        name: "form-panel",
        data() {
            return {
                form: {
                    name: '',
                    email: '',
                    password: '',
                    // confirm_password: '',
                },
                FormInfo: [
                    { sign: {
                            title: 'Create Account',
                            messageButton: 'Sing up'
                        }
                    },
                    { sign: {
                            title: 'Sign In',
                            messageButton: 'Sing In'
                        }
                    }
                ],
                loader: false,
                error: false
            }
        },
        methods: {
            controlAccess() {
                this.loader = true;
                if(this.signIn){
                    this.error = false;
                    login(this.$data.form)
                        .then((res) => {
                            console.log(res);
                            this.$store.commit('loginSuccess', res);
                            this.$router.push({path: '/'});
                        })
                        .catch((error) => {
                            this.$store.commit('loginFailed', {error});
                            this.error = true;
                        })
                        .finally(() => {
                            this.loader = false;
                        })
                }else{
                    this.error = false;
                    register(this.$data.form)
                        .then((res) => {
                            console.log(res);
                            this.$router.push({path: '/login'});
                        })
                        .catch((error) => {
                            this.$store.commit('loginFailed', {error});
                            this.error = true;
                        })
                        .finally(() => {
                            this.loader = false;
                        })
                }
                this.loader = false;
            },
            hideMessageError() {
                if(this.error)
                    this.error = false;
            },
            unableLoginButton() {}
        },
        computed: {
            authError() {
                return this.$store.getters.authError;
            },
            ...mapState('formPanels', ['signIn'])
        }
    }
</script>

<style scoped>
    .form-panel-test {
        width: 60%;
        height: calc(100% - 64px);
        padding: 0;
        margin: 0;
        position: absolute;
        top: 64px;
        left: 40%;
        transition-duration: 0.7s;
        z-index: 1;
    }

    #form-title {
        color: #26a69a;
        font-weight: 700
    }

    #inner-container-form-panel {
        width: 100%;
        position: relative;
        top: 10%;
    }

    .exchange-form-panel {
        transition-duration: 0.7s;
        left: 0;
    }

    #btn-login {
        width: 120px;
        height: 40px;
        border-radius: 100px;
    }

    .btn-form-action {
        width: 100%;
        border-radius: 100px;
    }

    .login-on {
        width: 53px;
        display: inline-block
    }

    .login-off, #container-preloader {
        display: none;
    }

    .preloader-on {
        width: 53px;
        height: 23px;
    }

    .preloader-wrapper {
        display: block !important;
        width: 23px !important;
        height: 23px !important;
        margin: 0 auto;
    }

    @media only screen and (max-width: 768px) {
        .form-panel-test {
            width: 100%;
            height: 400px;
            padding: 0;
            margin: 0;
            position: absolute;
            top: 279px;
            left: 0;
            transition-duration: 0.7s;
            z-index: 1;
        }

        .exchange-form-panel {
            transition-duration: 0.7s;
            height: 330px;
            top: 64px;
            left: 0;
        }

        #inner-container-form-panel {
            width: 100%;
            position: relative;
            top: 10px;
        }
    }
</style>

