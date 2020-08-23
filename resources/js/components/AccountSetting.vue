<template>
    <div class="col s12" style="padding: 24px; background-color: rgb(34,29,39);">
        <div class="container">
            <form>
                <div class="row">
                    <div class="input-field col s12">
                        <div id="container-user-image" style="width: 410px; height: 120px; margin: 0 auto; display: flex;">
                            <div style="width: 140px; display: inline-block">
                                <div id="inner-container-user-image" style="width: 100px;">
                                    <img :src="'/img/img.jpg'" alt="" class="circle responsive-img"> 
                                </div>
                                <a class="waves-effect waves-light orange" style="width: 30px; height: 30px; border-radius: 90px; top: -45px; left: 83px;">
                                    <i class="material-icons" style="font-size: 23px; color: #fff; margin-top: 3.5px; margin-left: 3px;">create</i>
                                </a>
                                <!-- <a class="waves-effect waves-light red" style="width: 30px; height: 30px; border-radius: 90px; top: -50px; left: 50px;">
                                    <i class="material-icons" style="font-size: 23px; color: #fff; margin-top: 3.5px; margin-left: 3px;">delete</i>
                                </a> -->
                            </div>
                            <div style="width: 250px; padding: 30px 0 0 10px; display: inline-block;">
                                <span style="font-size: 1.8rem; color: #fff">Cristian</span><br>
                                <span style="font-size: 1.1rem; color: #757575">cristian@email.com</span>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 style="color: #fff;">Account</h5>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input class="form-input" id="name" type="text" value="Cristian"/>
                        <label>Name</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input class="form-input" id="email" type="email" value="cristian@email.com"/>
                        <label>Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input class="form-input" id="password" type="password" value="1234"/>
                        <label>Password</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input class="form-input" id="confirm-password" type="password" value="1234"/>
                        <label>Confirmation Password</label>
                    </div>
                </div>
                <h5 style="color: #fff;">Language</h5>
                <div class="row">
                    <div class="input-field col s12 m6 form-input">
                        <select class="icons">
                            <option value="" disabled selected>Language</option>
                            <option value="" data-icon="/img/icons/united-states.png">EN (Default)</option>
                            <option value="" data-icon="/img/icons/spain.png">ES</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div style="width: 230px; margin: 0 auto;">
                        <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-right: 5px;">Save changes</button>
                        <a @click.prevent="redirect" class="btn waves-effect waves-light red" name="action">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
  </div>
</template>
<script>
    export default {
        name: 'account-settings',
        methods: {
            redirect() {
                this.$router.push('/');
            }
        }
    }
</script>
<style>
    .form-input {
        color: #fff;
        font-size: 1.1rem;
        font-weight: 450;
    }

    .select-dropdown {
        color: #fff !important;
    }

    .select-wrapper .caret {
        fill: rgba(255,255,2555,0.87) !important;
    }
</style>