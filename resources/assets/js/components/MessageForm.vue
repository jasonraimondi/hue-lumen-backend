<template>
    <div>
        <notification v-if="notification.show"
                      transition="bounce">{{ notification.message }}</notification>
        <input type="text" v-model="user.phone">
        <button class="button expanded" @click="sendPhone()">Send</button>
    </div>
</template>

<script>
    import Notification from './Notification.vue';

    export default {
        components: {
            Notification
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