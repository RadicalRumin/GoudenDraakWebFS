<template>
    <div class="w-full grid grid-cols-[2fr,1fr] gap-4">
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
                <tr v-for="dish in results" class="bg-white border-b hover:bg-gray-50 ">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.id }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.categoryName }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.dishName }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        <font-awesome-icon class="cursor-pointer w-4 h-4 text-green-600" :icon="['fas', 'plus']"
                            @click="chooseDish(dish)" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <Dialog v-model:visible="sidesVisible" @show="sidesVisible = true" @hide="sidesVisible = false" modal
        header="Bijgerecht"
        :style="{ width: '25rem', background: 'white', padding: '1rem', border: '3px solid black' }">
        <div class="m-2">

            <button v-for="side in sideDishes" class="rounded-full m-1 bg-blue-500 p-2 text-white"
                @click="{ addDish(side); sidesVisible = false; }">
                {{ side.dishName }} - €{{ side.price }}
            </button>

        </div>
    </Dialog>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { Dish } from '@/Models/dish';
import Dialog from "primevue/dialog";

const sidesVisible = ref(false);

const search = ref(getQueryParam('query') || "");
const props = defineProps<{ dishes: Dish[], sideDishes: Dish[] }>()
const results = ref<Dish[]>(props.dishes);
const sideDishes = ref<Dish[]>(props.sideDishes);
const loading = ref(false);
const selectedDishes = ref<Dish[]>([]);
const orderTotal = ref(0);


function getQueryParam(param: string) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

function addDish(dish: Dish) {
    selectedDishes.value.push(dish);
    orderTotal.value += Number(dish.price);
}

function chooseDish(dish: Dish) {
    sidesVisible.value = true;
    addDish(dish);
}
</script>

<script lang="ts">
import Layout from '@/Layouts/Restaurant/Layout.vue';

export default {
    layout: [Layout]
}
</script>