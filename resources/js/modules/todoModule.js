export default {
    state: {
        id: 0,
        inputTask: '',
        todo: {
            id: '',
            title: '',
            tasks: []
        },
    },
    mutations: {
        resetForm() {
            this.id = 0;
            this.todo.id = '';
            this.todo.title = '';
            this.todo.tasks = [];
        }
    }
}