<script setup>
    import { Link } from '@inertiajs/vue3';

</script>

<template>
    <div class="grid">
        <nav class="horizontal-bar sticky h-8 min-w-screen bg-blue-950 flex flex-row items-center justify-around">
            <div class="text-gray-400">
                Tafelnummer: 1
            </div>
            <div class="text-gray-400">
                Rondes: 5
            </div>
        </nav>
        <nav class="vertical-bar sticky w-12 min-h-screen bg-blue-950 flex flex-col items-center py-4 space-y-6">
            <Link href="/checkout" class="text-gray-400 hover:text-white">
                <font-awesome-icon :icon="['fa', 'cart-shopping']" />
            </Link>
            <Link href="/" class="text-gray-400 hover:text-white">
                <font-awesome-icon :icon="['fa', 'bowl-food']" />
            </Link>
        </nav>
        <slot />
    </div>
</template>