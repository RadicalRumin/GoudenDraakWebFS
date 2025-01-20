<script setup>
import Navigation from '@/Layouts/Restaurant/Navigation.vue';
</script>

<template>
    <Navigation>
        <slot />
    </Navigation>
</template>


<style>
.horizontal-bar {
    grid-row: 1 / 2;
    grid-column: 1 / 3;
}

.vertical-bar {
    grid-row: 2 / 3;
    grid-column: 1 / 2;
}

.content {
    grid-row: 2 / 3;
    grid-column: 2 / 3;
}
</style>