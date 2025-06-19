<template>
    <div>
        <h1>Bill Summary</h1>
        <p>Total: {{ orderTotal }}</p>
        <ul>
            <li v-for="order in orderItems" :key="order.id">
                {{ order.name }} - ${{ order.price }}
            </li>
        </ul>
        <h2>Scan this QR code</h2>
        <img :src="qrCodeBase64" alt="QR Code" />
    </div>
</template>

<script>
import Layout from '@/Layouts/Restaurant/Layout.vue';

export default {
    layout: [Layout,],
    props: {
        orderTotal: Number,
        orderItems: Array,
        qrCodeBase64: String,
    },
}

</script>
