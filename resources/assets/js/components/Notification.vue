<template>
    <div class="callout primary">
        <p><slot></slot></p>
    </div>
</template>

<style>
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
