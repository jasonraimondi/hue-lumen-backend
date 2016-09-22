<template>
    <div class="text-center">
        <notification v-if="notification.show"
                      transition="bounce">{{ notification.message }}</notification>
        <input type="tel" v-model="user.phone" placeholder="##########" id="flipp-phone-input" autofocus>
        <button v-if="user.phone" class="button large expanded flipp-submit-button" style="background-color:#4cae4c" @click="sendPhone()">Get Started</button>
    </div>
</template>

<style lang="sass">
    .flipp-submit-button {
        font-family: 'Fjalla One', sans-serif;
        font-size: 60px;
    }

    %flipp {
        border: none;
        cursor: none;
        box-shadow: none;
        background-color: transparent;
    }

    #flipp-phone-input {
        @extend %flipp;
        font-family: 'Fjalla One', sans-serif;
        color: white;
        font-size: 50px;
        height: 100%;

        &:focus {
         @extend %flipp;
        }
    }
</style>

<script>
    import Formatter from 'formatter.js/dist/formatter.js';
//    import 'cleave.js/dist/addons/cleave-phone.us.js';
    import Notification from './Notification.vue';

    export default {
        components: {
            Notification
        },
        ready() {
            var formatted = new Formatter(document.getElementById('flipp-phone-input'), {
                'pattern': '({{999}}) {{999}}-{{9999}}',
                'persistent': true
            });
        },
        data() {
            return {
                resourceUrl: '/sendText',
                notification: {
                    show: false,
                    message: ''
                },
                user: {
                    phone: ''
                },
            }
        },
        methods: {
            sendPhone() {
                this.$http.post(this.resourceUrl, {phone: this.user.phone}).then(function (response) {
                    this.user.phone = '';
                    this.notification.show = true;
                    console.log(response.data);
                    this.notification.message = response.data.message;
                    setTimeout(() => {
                        this.notification.show = false;
                    }, 3500);
                }, function (response) {
                    console.log('error', response.data);
                });

            },
        },
    }
</script>