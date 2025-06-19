<script lang="ts">
import Layout from '@/Layouts/Restaurant/Layout.vue';

export default {
    layout: [Layout,]
}
</script>

<template>
    <div class="w-full grid grid-cols-[2fr,1fr] gap-4">

        <div v-if="dishes.length > 0">
            <table class="table-auto w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nummer</th>
                        <th scope="col" class="px-6 py-3">Categorie</th>
                        <th scope="col" class="px-6 py-3">Gerecht</th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>

                    <tr v-for="dish in dishes" class="bg-white border-b hover:bg-gray-50 ">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.id }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.categoryName }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.dishName }}</td>
                    </tr>

                </tbody>
            </table>

            <button v-on:click="sendOrder">
                Send orders
            </button>

        </div>

        <div v-else>
            Nothing is the cart
        </div>

    </div>
</template>

<script lang="ts" setup>
    import { getDishes, clearDishes } from "../../Services/store"
    import { router } from '@inertiajs/vue3'
    import { toRaw } from "vue"

    const dishes = getDishes();



    function sendOrder() {
        const send = toRaw(dishes)
        router.post("/checkout",)

        router.post("/checkout", {
            method: 'post',
            data: send,
        })
        clearDishes();
    };
</script>