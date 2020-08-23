<template>
    <div class="inner-item-preview hoverable">
        <div style="width: inherit; height: inherit; background-color: transparent; z-index: 9999; cursor: pointer" @click="getItemForUpdate">
            <div style="width: 100%; padding: 4px;">
                <p class="truncate align-left" style="font-size: 1.2rem; font-weight: 600; color: #424242;" v-text="todo.title" data-position="top" data-tooltip="I am a tooltip"></p>
            </div>
            <div class="item-container">
                <ul style="z-index: 99">
                    <li v-for="task in todo.tasks" :key="task.id">
                        <p>
                            <label>
                                <input type="checkbox" v-model="task.checked">
                                <span class="truncate" :class="task.checked ? 'cross-text' : ''" v-text="task.task" style="font-size: .9rem; color: #424242"></span>
                            </label>
                        </p>
                    </li>
                </ul>
            </div>
            <div style="width: 100%; height: 50px; position: relative; left: 0; padding: 10px 10px 0 10px;">
                <span class="center" style="font-size: 11.5px; font-weight: 600; color: #424242;">Last mod. {{ todo.updated_at }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BoxItemTask",
        props: ['todo'],
        methods: {
            getItemForUpdate() {
                console.log('Item para actualizar');
            }
        }
    }
</script>

<style scoped>
    .box-wrapper-item-preview {
        height: 220px;
        margin: .25rem 0;
    }

    .inner-item-preview {
        width: 100%;
        height: 100%;
        border-radius: 5px;
        border: 1.2px solid #ffeb3b;
        background-color: #ffeb3b;
        transition: transform .2s;
    }

    .inner-item-preview:hover {
        transform: scale(1.04);
        -webkit-box-shadow: 6px 6px 5px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 6px 6px 5px 0px rgba(0,0,0,0.75);
        box-shadow: 6px 6px 5px 0px rgba(0,0,0,0.75);
    }

    .item-container {
        width: 100%;
        height: 150px;
        padding: 5px 10px 10px 10px;
        overflow: hidden;
        z-index: 99;
    }

    .cross-text {
        text-decoration: line-through;
        text-decoration-color: #424242;
    }
</style>