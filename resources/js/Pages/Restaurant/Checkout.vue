<script lang="ts">
import Layout from '@/Layouts/Restaurant/Layout.vue';

export default {
    layout: [Layout,]
}
</script>

<template>
    <!-- <div>
        <h1 class="text-2xl font-bold mb-4">Bestelling</h1>
        <ul class="list-none mr-8">
            <li v-for="dish in selectedDishes" class="mb-2 bg-white border-b hover:bg-gray-50 ">
                <div class="flex justify-between">
                    <span><span class="font-bold">{{ dish.dishName }}</span> - €{{ dish.price }}</span>
                    <font-awesome-icon class="cursor-pointer text-red-600" @click="removeDish(dish)"
                        :icon="['fas', 'xmark']" />

                </div>
            </li>
        </ul>
        <p class="text-xl font-bold">Totaal: €{{ orderTotal.toFixed(2) }}</p>
    </div> -->
</template>

<script setup>


</script>