<template>
    <div class="inner-item-preview" @click="showToUpdate(note)">
        <div style="width: 100%; padding: 4px;">
            <p class="truncate align-left p-title" style="color: #fff !important;">{{ note.title }}</p>
        </div>
        <div style="width: 100%; height: 130px; padding: 5px 10px 10px 10px; overflow: hidden">
            <p style="font-size: .9rem; color: #fff;">{{ note.note.content }}</p>
        </div>
        <div style="width: 100%; height: 35px; position: relative; top: 20px; left: 0; padding: 10px 10px 0 10px;">
            <span class="center" style="font-size: 11.5px; font-weight: 600; color: #fff;">Last mod. {{ note.updated_at }}</span>
        </div>
        <div style="display: none;">
            <a class="btn-floating orange modal-trigger btn-edit-on-item-preview"><i class="material-icons">mode_edit</i></a>
            <a class="btn-floating red modal-trigger btn-delete-on-item-preview" @click="deleteItem(note.id)"><i class="material-icons">delete</i></a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BoxItemNote",
        props: ['note'],
        methods: {
            showToUpdate(note) {
                this.$store.commit('noteModule/showNote', note);
                this.$store.commit('itemsModule/displayNoteModal');
                // axios.get(`/api/${id}`, {
                //     headers: {
                //         "Authorization": `Bearer ${this.$store.state.currentUser.token}`
                //     }
                // }).then((response) => {
                //     this.$store.commit('noteModule/showNote', response.data.note);
                //     this.$store.commit('itemsModule/displayNoteModal');
                // })
            },
            deleteItem(id) {
                console.log('Deleting the item #'+id);
            }
        },
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
        cursor: pointer;
        border-radius: 5px;
        border: 1.2px solid #546e7a;
        background-color: #546e7a;
        position: relative;
        transition: transform .2s;
    }

    .inner-item-preview:hover {
        transform: scale(1.03);
        -webkit-box-shadow: 6px 6px 5px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 6px 6px 5px 0px rgba(0,0,0,0.75);
        box-shadow: 6px 6px 5px 0px rgba(0,0,0,0.75);
    }

    .btn-edit-on-item-preview {
        position: absolute;
        top: 60px;
        right: 5px;
    }

    .btn-delete-on-item-preview {
        position: absolute;
        top: 120px;
        right: 5px;
    }

    /* .btn-edit-on-item-preview:hover {
        display: block;
        position: absolute;
        top: 40px;
        right: 20px;
    } */

    .p-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #424242;
    }

    /* .p-title-hov{
        color: #fff;
    } */

    /* .btn-delete-non-display {
        display: none;
    }

    .btn-delete-display {
        position: absolute;
        top: 80%;
        left: 85%;
        z-index: 9999;
    } */
</style>