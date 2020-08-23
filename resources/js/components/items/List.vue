<template>
    <div class="row" style="padding-top: 10px;">
        <div class="col s6 m4 l3 xl2 box-wrapper-item-preview" v-for="item in items" :key="item.id">
            <template v-if="item.note != null">
                <previewNote :note="item"></previewNote>
            </template>
            <template v-else>
                <previewTodo :todo="item"></previewTodo>
            </template>
        </div>
    </div>
</template>

<script>
    import previewNote from './BoxItemPreviewNote'
    import previewTodo from './BoxItemPreviewTodo'

    export default {
        name: "items",
        components: {
            previewNote,
            previewTodo
        },
        mounted() {
            this.$store.dispatch('getItems');
        },
        computed: {
            items() {
                return this.$store.getters.items;
            },
            notes() {
                return this.$store.getters.notes;
            },
            todos() {
                return this.$store.getters.todos;
            }
        }
    }
</script>

<style scoped>
    .box-wrapper-item-preview {
        height: 220px;
        margin: .25rem 0;
    }

    /* .inner-item-preview {
        width: 100%;
        height: 100%;
        border-radius: 5px;
        border: 1.2px solid #607d8b;
        background-color: rgb(34, 29, 39);
        position: relative;
        -moz-transition: all .2s ease-in;
        -o-transition: all .2s ease-in;
        -webkit-transition: all .2s ease-in;
        transition: all .2s ease-in;
    }

    .inner-item-preview:hover {
        background-color: rgba(18, 16, 20, 0.95);
        color: black;
    } */

    .btn-delete-non-display {
        display: none;
    }

    .btn-delete-display {
        position: absolute;
        top: 80%;
        left: 85%;
        z-index: 9999;
    }
</style>
