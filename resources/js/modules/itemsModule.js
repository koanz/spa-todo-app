import {mapMutations} from 'vuex'
export default {
    //name: HomeModule
    namespaced: true,
    state: {
        isModalVisible: false,
        displayModal: [
            { modal: 'Note', show: false },
            { modal: 'Todo', show: false }
        ],
        actionButton: false,
        formAction: {
            actionCreate: 'Create',
            actionUpdate: 'Update'
        },
        errors: null
    },
    methods: {
        ...mapMutations('noteModule', ['resetForm']),
    },
    mutations: {
        displayNoteModal(state) {
            document.getElementById("background-unlocked").classList.add('background-locked');
            state.displayModal[0].show = true;
            state.isModalVisible = true;
        },
        displayTodoModal(state) {
            document.getElementById("background-unlocked").classList.add('background-locked');
            state.displayModal[1].show = true;
            state.isModalVisible = true;
        },
        closeModal(state) {
            document.getElementById("background-unlocked").classList.remove('background-locked');
            state.isModalVisible = false;
            if(state.displayModal[0].show) {
                state.displayModal[0].show = false;
            }else{
                state.displayModal[1].show = false;
            }
        },
        inputsModalErrors(state, payload) {
            state.errors = payload.error;
        }
    },
    getters: {
        displayModal(state) {
            return state.displayModal;
        },
        note(state) {
            return state.note;
        },
    },
    actions: {
        getNote(context) {
            axios.get('/api/note/', {
                headers: {
                    "Authorization": `Bearer ${context.state.currentUser.token}`
                }
            }).then((response) => {
                context.commit('updateItems', response.data.items);
            })
        },
        closeModal(context) {
            context.commit('closeModal');
            this.$store.commit('noteModule/resetForm');
        }
    }
}