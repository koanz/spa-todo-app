<template>
    <div class="card">
        <h5 class="center" style="font-weight: 600; color: #424242;">Note</h5>
        <form class="col s12">
            <div class="card-content" style="padding-top: 0;">
                <div class="row" style="margin-bottom: 0;">
                    <div class="input-field col s12">
                        <input type="text" name="title" v-model="note.title" style="font-size: 1.2rem !important; color: #424242;" placeholder="Title" required>
                    </div>
                    <div class="col s12" style="height: 230px;">
                        <div class="input-field col s12" style="padding-left: 0; padding-right: 0; margin-bottom: 0;">
                            <textarea name="content" v-model="note.content" style="color: #424242; width: 100%; height: inherit; resize: none; padding: 0 3px 0 3px;" rows="13" cols="40" placeholder="Right here, right now.." required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-action" style="border-top: 0; padding-top: 0; padding-bottom: 0;">
                <div class="container-action" style="width: 82px; margin: 0 auto;">
                    <template v-if="actionButton">
                        <button class="btn waves-effect waves-light modal-close" @click.prevent="create">{{ formAction.actionCreate }}</button>
                    </template>
                    <template v-else>
                        <button class="btn waves-effect waves-light modal-close" @click.prevent="update">{{ formAction.actionUpdate }}</button>
                    </template>
                    <!-- <a class="waves-effect waves-light red btn" @click="resetForm">Clear</a> -->
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import validate from 'validate.js'
    import {mapState, mapMutations} from 'vuex'

    export default {
        name: 'note',
        computed: {
            ...mapState('noteModule', ['note', 'actionCreate', 'formAction', 'actionButton']),
            // currentUser() {
            //     return this.$store.getters.currentUser;
            // },
            items() {
                return this.$store.getters.items;
            }
        },
        methods: {
            ...mapMutations('noteModule', ['resetForm']),
            create() {
                // const constraints = this.validateInputs();
                // const error = validate(this.note, constraints);

                // if(error) {
                //     this.$store.commit('itemsModule/inputsModalErrors');
                // }
                console.log('Creating..');
                // axios.post(`/api/notes`, {
                //     title: this.note.title,
                //     content: this.note.content
                // }).then((response) => {
                //     this.$store.commit('addNewItemToTheList', response.data.item);
                //     this.$store.commit('noteModule/resetForm');
                //     this.$store.commit('itemsModule/closeModal');
                // }).catch(function(error) {
                //     console.log(error);
                //     // console.error(error);
                // });
            },
            update() {
                axios.patch(`/api/notes/${this.note.id}`, {
                    title: this.note.title,
                    content: this.note.content
                }).then((response) => {
                //    console.log(this.$store.getters.items);
                    // this.$store.commit('itemsModule/loadNote', response.data.note);
                    // this.$store.commit('itemsModule/displayNoteModal');
                }).catch((error) => {
                    console.error(error);
                });
            },
            validateInputs() {
                return {
                    title: {
                        presence: true,
                        length: {
                            minimun: 1,
                            message: 'Cannot be empty.'
                        }
                    },
                    content: {
                        presence: true,
                        length: {
                            minimun: 1,
                            message: 'Cannot be empty.'
                        }
                    }
                }
            }
        }
    }
</script>
<style scoped>
    textarea {
        outline: none;
    }

    textarea:focus {
        border: 2px solid #26a69a;
    }
</style>
