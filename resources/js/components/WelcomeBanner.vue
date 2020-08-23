<template>
    <div class="row" style="padding-top: 10px;">
        <div class="col s12">
            <div class="card-panel" id="card-panel-user-welcome">
                <div class="row valign-wrapper">
                    <div id="container-user-image">
                        <div id="inner-container-user-image">
                            <img :src="'/img/img.jpg'" alt="" class="circle responsive-img"> 
                        </div>
                    </div>
                    <div id="container-welcome-message">
                        <span class="title">Hello, {{ currentUser.name }}</span>
                        <p>You have 
                            <span id="item-user-count">{{ itemsCount }} items</span> today<br>
                        </p>
                        <span id="current-date">{{ today }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "welcome-banner",
        data() {
            return {
                today: new Date().toDateString(),
            }
        },
        computed: {
            currentUser() {
                return this.$store.getters.currentUser;
            },
            itemsCount() {
                return this.$store.getters.itemsCount;
            }
        }
    }
</script>

<style scoped>
    #card-panel-user-welcome {
        padding: 5px 24px;
        border-radius: 10px;
        background-color: rgba(56,51,60,0.9);
    }

    #card-panel-user-welcome .valign-wrapper {
        margin-bottom: 5px;
    }

    #container-user-image {
        width: 64px;
    }

    #inner-container-user-image {
        width: 52px;
        height: 52px;
        margin: 0 auto;
    }

    #inner-container-user-image img {
        width: 100%;
        height: 100%;
    }

    #container-welcome-message {
        width: calc(100% - 64px);
        margin-left: 10px;
    }

    #container-welcome-message .title {
        font-size: 2rem;
        font-weight: 600;
        color: #fff;
    }

    #container-welcome-message p {
        font-size: 1.2rem;
        margin: 5px 0px;
        color: #fff;
    }

    #item-user-count {
        color: #fb8c00;
        font-weight: 700;
    }

    #container-welcome-message #current-date {
        font-size: 1rem;
        font-weight: 500;
        color: #fff;
    }
</style>
