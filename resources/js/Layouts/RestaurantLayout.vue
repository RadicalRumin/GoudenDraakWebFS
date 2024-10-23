<script setup>
import { defineProps } from 'vue';

defineProps({
    tableNumber: {
        type: Number,
        required: true
    },
    roundNumber: {
        type: Number,
        required: true
    },
    timer: {
        type: Number,
        required: true
    }
});
</script>

<template>
    <header>
        Tafelnummer: {{ $page.props.tableNumber }}
        Rondenummer: {{ $page.props.roundNumber }}
        Timer: {{ $page.props.timer }}
    </header>
    <main>
        <slot />
    </main>
</template>