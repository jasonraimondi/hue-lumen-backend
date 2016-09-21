<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flipp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.3/foundation.min.css" />
<!--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.3/foundation.min.js"></script>-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.2/vue-resource.min.js"></script>


</head>
<style>
    html,
    body {
        width: 100%;
        height: 100%;
    }

    #main-container {
        width: 100%;
        height: 100%;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }

    #app {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        max-width: 400px;
        width: 100%;
    }
</style>
<body>

<section id="main-container">
    <div id="app">
        <input type="text" v-model="user.phone">
        <button class="button expanded" @click="sendPhone()">Send</button>
    </div>
</section>

<script>
    new Vue({
        el: '#app',
        data() {
            return {
                resourceUrl: '/sendText',
                user: {
                    phone: ''
                },
            }
        },
        methods: {
            sendPhone() {

                this.$http.post(this.resourceUrl, {phone: this.user.phone}).then(function (response) {
                    console.log(response.data);
                    this.user.phone = '';
                }, function (response) {
                    console.log('error', response.data);
                });

                console.log(this.user.phone);
            },
        },
    });
    new Vue({
        el: '#app',
        data() {
            return {
                resourceUrl: '/sendText',
                user: {
                    phone: ''
                },
            }
        },
        methods: {
            sendPhone() {
                console.log(this.user.phone);
            },
        },
    });

</script>

</body>

</html>