<template>
    <section id="main-container">
        <img src="/images/flipp.svg" alt="">
        <h3 style="color: white;padding-left:8px;">Want to join the party?</h3>
        <message-form></message-form>
    </section>
</template>

<style>
    html,
    body {
        width: 100%;
        height: 100%;
    }
    #app {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    #main-container {
        width: 100%;
        max-width: 350px;
    }
</style>

<script>

import MessageForm from './components/MessageForm.vue';

export default {
    components: {
        MessageForm:MessageForm,
    },
}

</script>
