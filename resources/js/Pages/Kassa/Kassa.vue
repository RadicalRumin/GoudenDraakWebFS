<template>
    <div>
        <h1 class="text-2xl font-bold mb-4">Dishes</h1>
        <input type="text" v-model="search" @input="fetchResults" placeholder="Search dishes..."
            class="mb-4 p-2 border rounded" />

        <div class="w-full grid grid-cols-[2fr,1fr] gap-4">
            <table class="table-auto w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nummer</th>
                        <th scope="col" class="px-6 py-3">Categorie</th>
                        <th scope="col" class="px-6 py-3">Gerecht</th>
                        <th scope="col" class="px-6 py-3">Prijs</th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="dish in results" class="bg-white border-b hover:bg-gray-50 ">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.id }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.categoryName }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.name }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">€{{ dish.price }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <font-awesome-icon class="cursor-pointer w-4 h-4 text-green-600"
                            :icon="['fas', 'plus']" @click="chooseDish(dish)"/>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <h1 class="text-2xl font-bold mb-4">Bestelling</h1>
                <ul class="list-none mr-8">
                    <li v-for="dish in selectedDishes" class="mb-2 bg-white border-b hover:bg-gray-50 ">
                        <div class="flex justify-between">
                            <span><span class="font-bold">{{ dish.name }}</span> - €{{ dish.price }}</span>
                            <font-awesome-icon class="cursor-pointer text-red-600" @click="removeDish(dish)"
                                :icon="['fas', 'xmark']" />

                        </div>
                    </li>
                </ul>
                <p class="text-xl font-bold">Totaal: €{{ orderTotal.toFixed(2) }}</p>
                <span v-if="selectedDishes.length > 0" >
                    <button class="bg-blue-500 text-white p-2 rounded-full mt-4" @click="placeOrder()">Bestelling plaatsen</button>
                </span>

            </div>
        </div>
    </div>

    <Dialog
        v-model:visible="sidesVisible"
        @show="sidesVisible = true"
        @hide="sidesVisible = false"
        modal
        header="Bijgerecht"
        :style="{ width: '25rem', background: 'white', padding: '1rem', border: '3px solid black' }"
    >
        <div class="m-2">

            <button v-for="side in sideDishes" class="rounded-full m-1 bg-blue-500 p-2 text-white" @click="{addDish(side); sidesVisible = false;}">
                {{ side.name }} - €{{ side.price }}
            </button>
            
        </div>
    </Dialog>
    <form id="downloadForm" action="/bill/pdf" method="POST" style="display:none;">
    @csrf
        <input type="hidden" name="dishes" :value="JSON.stringify(selectedDishes)" />
    </form>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { Dish } from '@/Models/dish';
import { router } from '@inertiajs/vue3';
import Dialog from "primevue/dialog";

const  sidesVisible = ref(false);

const search = ref(getQueryParam('query') || "");
const props = defineProps<{ dishes: Dish[], sideDishes: Dish[] }>()
const results = ref<Dish[]>(props.dishes);
const sideDishes = ref<Dish[]>(props.sideDishes);
const loading = ref(false);
const selectedDishes = ref<Dish[]>([]);
const orderTotal = ref(0);
const noSidesList = ['Bijgerechten'];

function fetchResults() {
    loading.value = true;
    router.get('/', { query: search.value }, {
        preserveState: true,
        only: ['dishes'],
        onSuccess: (page) => {
            results.value = page.props.dishes as Dish[];
            loading.value = false;
        },
    });
};

function getQueryParam(param: string) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

function addDish(dish: Dish) {
    selectedDishes.value.push(dish);
    orderTotal.value += Number(dish.price);
}

function removeDish(dish: Dish) {
    const index = selectedDishes.value.indexOf(dish);
    selectedDishes.value.splice(index, 1);
    orderTotal.value -= Number(dish.price);
}

function chooseDish(dish: Dish) {
    if (!(noSidesList.includes(dish.categoryName))) {
        sidesVisible.value = true;
    }
    addDish(dish);
}

function placeOrder() {
    // @ts-ignore
    document.getElementById('downloadForm').submit();
    
}

</script>
