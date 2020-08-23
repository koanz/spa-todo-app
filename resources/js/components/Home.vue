<template>
    <div style="padding: 24px 0;">
        <transition name="bounce">
            <ItemModalForm v-if="isModalVisible" @close="closeModal"></ItemModalForm>
        </transition>

        <welcome-banner></welcome-banner>

        <div class="row">
            <div class="col s12" id="root">
                <div class="nav-wrapper" style="width: 100%; height: 55px; margin-bottom: 10px;">
                    <div class="fixed-action-btn click-to-toggle left" style="position: relative; top: 0; right: 0;">
                        <a class="btn-floating btn-large red">
                            <i class="large material-icons">add</i>
                        </a>
                        <ul>
                            <li><a class="btn-floating tooltipped amber darken-2" @click="displayTodoModal" data-position="top" data-tooltip="new todo list"><i class="material-icons">format_list_bulleted</i></a></li>
                            <li><a class="btn-floating tooltipped blue lighten-1" @click="displayNoteModal" data-position="top" data-tooltip="new note"><i class="material-icons">note</i></a></li>
                        </ul>
                    </div>

                    <!-- <input id="search" type="search" placeholder="Search" style="color: grey; font-weight: 600; border-bottom: 0px !important; margin-left: 10px;"> -->
                    
                    <ul class="right" id="display-icon-option-grid">
                        <li>
                            <a><i class="material-icons right" @click="gridByColumn()">view_column</i></a>
                        </li>
                        <li>
                            <a><i class="material-icons icon-grid-off right" @click="gridByRow()">view_list</i></a>
                        </li>
                    </ul>
                </div>
                <transition name="fade">
                    <items></items>
                </transition>
            </div>   
        </div>
    </div>
</template>

<script>
    import {mapState, mapMutations} from 'vuex'
    import WelcomeBanner from './WelcomeBanner'
    import Items from './items/List'
    import ItemModalForm from './items/Modal'

    export default {
        name: "home-page",
        components: {
            WelcomeBanner,
            Items,
            ItemModalForm
        },
        data() {
            return {
                error: null
            }
        },
        computed: {
            ...mapState('itemsModule', ['isModalVisible'])
        },
        methods: {
            ...mapMutations('itemsModule', ['displayNoteModal', 'displayTodoModal', 'closeModal']),
            //...mapActions('itemsModule', ['displayModal']),
            // ...mapMutations('itemsModule', ['displayNoteModal', 'displayTodoModal', 'closeModal']),
            // displayModal(indexModal) {
            //     if(indexModal === 0) {
            //         this.$store.commit('itemsModule/displayNoteModal');
            //     } else {
            //         this.$store.commit('itemsModule/displayTodoModal');
            //     }
            // },
            gridByColumn() {
                console.log('Grid by Column')
            },
            gridByRow() {
                console.log('Grid by Row')
            }
        },
        mounted() {
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.modal');
                var instances = M.Modal.init(elems);

                var floating_button = document.querySelectorAll('.fixed-action-btn');
                var instances = M.FloatingActionButton.init(floating_button, {
                    direction: 'right',
                    hoverEnabled: false
                });
            });
        }
    }
</script>

<style scoped>
    .bounce-enter-active {
        animation: bounce-in .35s;
    }
    .bounce-leave-active {
        animation: bounce-in .35s reverse;
    }
    @keyframes bounce-in {
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1.5);
        }
        100% {
            transform: scale(1);
        }
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }

    #user-banner {
       box-shadow:  0 2px 2px 2px rgba(0,0,0,0.14),
       0 3px 1px -2px rgba(0,0,0,0.12),
       0 1px 5px 0 rgba(17, 17, 17, 0.2);
    }

    #display-icon-option-grid {
        padding: 25px 10px 0 0;
    }

    #display-icon-option-grid li{
        display: inline-block;
    }

    textarea {
        height: auto;
        resize: none;
    }

    .form-new-note {
        overflow: hidden;
        height: 0px;
        transition: height .8s;
        -moz-transition: height .8s;
        /* Firefox 4 */
        -webkit-transition: height .8s;
        /* Safari and Chrome */
        -o-transition: height .8s;
    }

    #modal-note, #modal-todo{
        width: 300px !important;
        height: 450px !important;
        border-radius: 15px;
        overflow: visible;
    }

    #modal-note .card {
        width: 100%;
        height: 100%;
        margin: 0;
        top: 0;
        border-radius: inherit;
        position: absolute;
    }

    #modal-note .card, #modal-todo .card {
        box-shadow: none;
    }

    #modal-todo {
        background-color: rgb(255,255,255);
    }

    /* .icon-grid-on {

    } */

    .icon-grid-off {
        color: #9e9e9e;
    }
</style>