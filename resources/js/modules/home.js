export default {
    namespaced: true,
    state: {
        isModalVisible: false,
        displayModal: [
            { modal: 'Note', show: false },
            { modal: 'Todo', show: false }
        ],
        note: {
            title: '',
            body: ''
        },
        todo: {
            title: '',
            tasks: []
        }
    },
    mutations: {
        displayNoteModal(state) {
            console.log(state.isModalVisible);
            if(state.displayModal[0].show){
                state.displayModal[0].show = false;
                state.isModalVisible = false;
            }else{
                if(state.displayModal[1].show)
                    state.displayModal[1].show = false;
                state.displayModal[0].show = true;
                state.isModalVisible = true;
            }
        },
        displayTodoModal(state) {
            if(state.displayModal[0].show)
                state.displayModal[0].show = false;
            state.displayModal[1].show = true;
            state.isModalVisible = true;
        },
        hideModal(state) {
            state.isModalVisible = false;
        },
        resetModalNote(state) {
        },
        resetModalTodo(state) {
            
        }
    },
    actions: {
    },
    getters: {
        displayModal(state) {
            return state.displayModal;
        }
    }
}