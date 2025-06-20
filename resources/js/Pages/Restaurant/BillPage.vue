<template>
    <div>
        <h1>Bill Summary</h1>
        <p>Total: €{{ orderTotal }}</p>
        <h2>Review your experience</h2>
        <img :src="qrCodeBase64" alt="QR Code" />
    </div>
</template>

<script>
import { refreshCookie } from '@/Composables/useRestaurantCookie';
import Layout from '@/Layouts/Restaurant/Layout.vue';

await fetch("/forget-restaurant-auth");
refreshCookie();

export default {
    layout: [Layout,],
    props: {
        orderTotal: Number,
        orderItems: Array,
        qrCodeBase64: String,
    },
}

</script>
