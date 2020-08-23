<template>
    <div id="modal" class="modal" @keydown.esc="$emit('close')">
        <div id="container-btn-x">
            <i class="material-icons" id="btn-x" @click="$emit('close')">close</i>
        </div>
        <template v-if="displayModal[0].show">
            <NoteBody></NoteBody>  
        </template>
        <template v-else>
            <TodoBody></TodoBody>
        </template>
    </div>
</template>
<script>
    import NoteBody from './modal/Note'
    import TodoBody from './modal/Todo'
    import {mapState, mapMutations} from 'vuex'

    export default {
        name: 'form-modal',
        components: {
            NoteBody, TodoBody
        },
        computed: {
            ...mapState('itemsModule', ['displayModal'])
        }
    }
</script>
<style scoped>
    .modal {
        display: block;
        max-height: none;
    }

    #modal{
        width: 300px !important;
        height: 450px !important;
        border-radius: 15px;
        overflow: visible;
        z-index: 99999;
    }

    #modal .card {
        width: 100%;
        height: 100%;
        margin: 0;
        top: 0;
        border-radius: inherit;
        position: absolute;
    }

    #modal- .card {
        box-shadow: none;
    }

    #modal {
        background-color: rgb(255,255,255);
    }

    #container-btn-x {
        width: 35px;
        height: 35px;
        position: absolute;
        top: 5px;
        right: 5px;
        z-index: 10;
    }

    #btn-x {
        font-size: 2.5rem;
        color: #424242;
        cursor: pointer;
    }

    #btn-x:hover {
        transform: rotate(180deg);
        -webkit-transform: rotate(180deg);
        transition-duration: 0.3s;
        transition-timing-function: ease-in-out;
    }
</style>