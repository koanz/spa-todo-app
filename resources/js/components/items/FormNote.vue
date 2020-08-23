<template>
    <div class="row" v-if="isShowFormNote">
        <div class="card">
            <form @submit.prevent="newNote" class="col s12">
                <div class="card-content black-text" style="padding-top: 0;">
                    <div class="row" style="margin-bottom: 0;">
                        <div class="input-field col s12 m6 l4">
                            <i class="material-icons prefix" style="color: #fff;">text_format</i>
                            <input type="text" name="title" style="font-size: 1.5rem !important;" placeholder="Title">
                        </div>
                        <div class="input-field col s12" style="margin-bottom: 0;">
                            <i class="material-icons prefix" style="color: #fff;">comment</i>
                            <textarea id="textarea2" name="body" style="color: white;" class="materialize-textarea" data-length="250" placeholder="write here"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-action" style="border-top: 0; border-bottom: 1px solid #fff; padding-bottom: 20px;">
                    <div class="container-action" style="width: 180px; position: relative; right: 0;">
                        <button class="btn waves-effect waves-light" @submit.prevent="createNote" name="action" style="margin: 0 5px 0 0;">Create</button>
                        <a class="waves-effect waves-light red btn">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    name: "formNote",
    data() {
        return {
            isShowFormNote: false,
        }
    }
}
</script>
<style scoped>

</style>