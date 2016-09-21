<template>
    <section id="main-container">
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
        max-width: 400px;
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
