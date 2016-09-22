<template>
    <div class="flipp-notification">
        <span><slot></slot></span>
    </div>
</template>

<style>
    .flipp-notification {
        font-family: 'Fjalla One', sans-serif;
        background-color: white;
        color: black;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        text-align: center;
        padding: 15px 0;
        z-index: 9999;
        width: 200px;
        margin: 0 auto;
    }
    .bounce-transition {
        display: inline-block; /* otherwise scale animation won't work */
        width: 100%;
    }
    .bounce-enter {
        animation: bounce-in .5s;
    }
    .bounce-leave {
        animation: bounce-out .5s;
    }
    @keyframes bounce-in {
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1.2);
        }
        100% {
            transform: scale(1);
        }
    }
    @keyframes bounce-out {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(0);
        }
    }
</style>

<script>
    export default {
        data() {
            return { message: 'I am a notification' };
        }
    }
</script>
