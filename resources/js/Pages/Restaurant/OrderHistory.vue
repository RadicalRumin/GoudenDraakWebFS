<script lang="ts">
import Layout from '@/Layouts/Restaurant/Layout.vue';

export default {
    layout: [Layout,]
}
</script>

<template>
    <div class="w-full flex flex-col gap-6">

        <div v-if="orderHistory.length > 0">
            <div v-for="(order, index) in orderHistory" :key="index" class="border p-4 rounded bg-white shadow">

                <div class="flex justify-between items-center mb-2">
                    <h2 class="font-semibold text-lg">Ronde {{ order.round }}</h2>
                    <button
                        @click="addRoundToCart(order.dishes)"
                        class="bg-green-600 text-white text-sm px-3 py-1 rounded hover:bg-green-700">
                        Herhaal deze rondebestelling
                    </button>
                </div>

                <table class="table-auto w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="px-4 py-2">Nummer</th>
                            <th class="px-4 py-2">Categorie</th>
                            <th class="px-4 py-2">Gerecht</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="dish in order.dishes" :key="dish.id" class="bg-white border-b hover:bg-gray-50">
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">{{ dish.id }}</td>
                            <td class="px-4 py-2 text-gray-900 whitespace-nowrap">{{ dish.categoryName }}</td>
                            <td class="px-4 py-2 text-gray-900 whitespace-nowrap">{{ dish.dishName }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <div v-else class="text-gray-600">
            Geen bestelhistorie beschikbaar.
        </div>

    </div>
</template>


<script lang="ts" setup>
import { ref } from 'vue'
import { addDishes, getOrderHistory } from '@/Services/store'
import { Dish } from '@/Models/dish'

const orderHistory = ref(getOrderHistory());

function addRoundToCart(roundDishes: Dish[]) {
    roundDishes.forEach(dish => addDishes(dish));
}
</script>