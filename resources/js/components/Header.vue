<template>
    <div>
        <nav>
            <div class="nav-wrapper">
                <a class="brand-logo" href="/" style="margin-top: 8px;">
                    <div style="width: 50px; height: 50px;">
                        <img :src="'/img/logo/4.png'" alt="" style="width: 100%;">
                    </div>
                </a>
                <ul id="nav-mobile" class="right">
                    <template v-if="currentUser">
                        <li>
                            <a class="dropdown-trigger" data-target="dropdown1">{{ currentUser.email }}<i class="material-icons right">arrow_drop_down</i></a>
                        </li>
                        <ul id="dropdown1" class="dropdown-content">
                            <li><a @click.prevent="settings"><i class="material-icons">settings</i>Settings</a></li>
                            <li><a @click.prevent="logout"><i class="material-icons">exit_to_app</i>Logout</a></li>
                        </ul>
                    </template>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        name: 'navbar-header',
        methods: {
            settings() {
                this.$router.push('/settings');
            },
            logout() {
                this.$store.commit('logout');
                this.$router.push('/login');
            }
        },
        computed: {
            currentUser() {
                return this.$store.getters.currentUser;
            }
        },
        mounted () {
            M.AutoInit();
        },
    }
</script>

<style scoped>
    nav {
        height: 64px;
        min-width: 400px;
        z-index: 99;
    }

    nav .nav-wrapper {
        padding: 0px 5px;
    }

    #dropdown1 {
        top: 64px !important;
    }
</style>
