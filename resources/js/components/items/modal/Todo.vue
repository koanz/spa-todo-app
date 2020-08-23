<template>
    <div class="card">
        <h5 class="center" style="font-weight: 600; color: #424242;">Todo</h5>
        <form class="col s12">
            <div class="card-content" style="max-height: 350px; padding-top: 0; padding-bottom: 0">
                <div class="row" style="margin-bottom: 0;">
                    <div class="input-field col s12">
                        <input type="text" name="title" v-model="todo.title" style="font-size: 1.2rem !important; color: #424242;" placeholder="Title">
                    </div>
                    <div class="input-field col s12" style="margin-top: 0; margin-bottom: 10px;">
                        <input 
                            v-on:keydown.enter.prevent="addNewTask"
                            v-model="inputTask"
                            placeholder="Enter new task" type="text" style="max-width: 400px; display: block;">
                    </div>
                </div>
                <div class="row">
                    <div class="col s12" style="height: 175px; overflow: auto;">
                        <p class="prefix" v-for="task in todo.tasks" :key="task.id">
                            <label> 
                                <input 
                                    v-model="task.checked" 
                                    @click="doneTask(task)" type="checkbox"/>
                                <span v-text="task.task"></span>
                            </label>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-action">
                <div class="container-action" style="width: 82px; margin: 0 auto;">
                    <button class="btn waves-effect waves-light modal-close" @click.prevent="create()">Create</button>
                    <!-- <a class="waves-effect waves-light red btn" @click="resetForm">Clear</a> -->
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import {mapState, mapMutations} from 'vuex'
    
    export default {
        name: 'todo',
        data() {
            return {
                id: 0,
                inputTask: '',
                todo: {
                    id: '',
                    title: '',
                    tasks: []
                }
            }
        },
        computed: {
            // ...mapState('itemsModule', ['todo'])
        },
        methods: {
            ...mapMutations('todoModule', ['resetForm']),
            addNewTask() {
                if (this.isInputTaskEmpty()) {
                    var toastHTML = '<span style="font-weight: 600">Cannot add an <span style="color: #ef5350;">empty task</span></span>';
                    return M.toast({html: toastHTML});
                }

                this.todo.tasks.unshift({
                    id: this.id++,
                    task: this.inputTask,
                    checked: false
                });
                console.log('entre');
                this.inputTask = "";
            },
            doneTask: function (task) {
                task.checked ? task.checked = false : task.checked = true;
            },
            create() {
                axios.post(`/api/todos`, {
                    title: this.todo.title,
                    tasks: this.todo.tasks
                }).then((response) => {
                    this.$store.commit('addNewItem', response.data.item);
                    this.$store.commit('todoModule/resetForm');
                    this.$store.commit('itemsModule/closeModal');
                }).catch((error) => Promise.reject(error));
            },
            isInputTaskEmpty() {
                return this.inputTask.length === "" ? true : false;
            }
        }
    }
</script>
<style scoped>
    #wrapper-task {
        width: 100%;
        height: auto;
    }

    #wrapper-task p {
        padding-left: 8px;
    }

    .card-action {
        border-top: 0 !important;
        padding: 0 0 12px 0!important;
    }
</style>