<template>
    <h1>{{ message }}</h1>
    <input type="text" v-model="message" />
</template>

<script setup lang="ts">
    import { ref } from 'vue';
    const message = ref('Hello world!');
</script>

<style scoped>
    h1 {
        color: red;
        background-color: yellow;
    }

    input {
        padding: 10px;
        font-size: 16px;
    }


</style>
