<template>
    <div id="main-container">
        <Header></Header>
        <div id="inner-container">
            <template v-if="isModalVisible">
                <div id="background-unlocked" @click="closeModal"></div>
            </template>
            <transition name="fade" mode="out-in">
                <router-view></router-view>
            </transition>
        </div>
    </div>
</template>

<script>
    import Header from './Header';
    import {mapMutations, mapState} from 'vuex';

    export default {
        name: 'main-app',
        components: {Header},
        methods: {
            ...mapState('itemsModule', ['isModalVisible']),
            ...mapMutations('itemsModule', ['closeModal'])
        }
    }
</script>

<style scoped>
    #main-container {
        height: inherit;
        background-color: #221d27;
    }

    .background-locked {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .6);
        display: table;
        transition: opacity .3s ease;
    }

    #inner-container {
        width: 85% !important;
        height: inherit;
        margin: 0 auto;
    }
</style>
