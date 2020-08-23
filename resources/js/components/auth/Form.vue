<template>
    <div class="row" id="form-wrapper">
        <message-panel></message-panel>
        <form-panel></form-panel>
    </div>
</template>

<script>
    import MessagePanel from './MessagePanel'
    import FormPanel from './FormPanel'

    export default {
        name: "Form",
        components: {
            MessagePanel,
            FormPanel
        }
    }
</script>

<style scoped>
    #form-wrapper {
        background-color: #e0f2f1;
        margin-bottom: 0px;
        overflow: auto;
    }
</style>
