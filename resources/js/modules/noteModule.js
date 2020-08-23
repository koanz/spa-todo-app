export default {
    namespaced: true,
    state: {
        isShow: false,
        note: {
            id: '',
            title: '',
            content: ''
        },
        actionButton: true,
        formAction: {
            actionCreate: 'Create',
            actionUpdate: 'Update'
        },
        error: null
    },
    mutations: {
        showNote(state, payload) {
            state.note.id = payload.id;
            state.note.title = payload.title;
            state.note.content = payload.note.content;
            state.actionButton = false;
        },
        resetForm(state) {
            state.note.id = '';
            state.note.title = '';
            state.note.content = '';
        }
    },
    getters: {
        note(state) {
            return state.note;
        },
        error(state) {
            return state.error;
        }
    },
    actions: {
        delete() {
            axios.put(`/api/${note.id}`, {
                headers: {
                    "Authorization": `Bearer ${this.$store.state.currentUser.token}`
                }
            }).then((response) => {
                // this.$store.commit('itemsModule/loadNote', response.data.note);
                // this.$store.commit('itemsModule/displayNoteModal');
            })
        },
        get() {
            axios.get(`/api/${note.id}`, {
                headers: {
                    "Authorization": `Bearer ${this.$store.state.currentUser.token}`
                }
            }).then((response) => {
                this.$store.commit('itemsModule/loadNote', response.data.note);
                this.$store.commit('itemsModule/displayNoteModal');
            })
        },
        getAll() {
            axios.get(`/api/notes`, {
                headers: {
                    "Authorization": `Bearer ${this.$store.state.currentUser.token}`
                }
            }).then((response) => {
                this.$store.commit('updateListOfItems', response.data.notes);
            })
        }
    }
}
