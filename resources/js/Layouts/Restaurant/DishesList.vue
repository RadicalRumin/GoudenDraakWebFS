<script setup lang="ts">
import { Dish } from '@/Models/dish';
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps<{ dishes: Dish[] }>();
const dishes = ref<Dish[]>(props.dishes);
</script>

<template>
    <div class="flex-1 w-full h-lvh overflow-y-auto">
        <div
            class="grid grid-flow-row gap-4 text-neutral-600 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
            <div v-for="index in 10" :key="index" class="flex-1 min-w-24 bg-white rounded-lg p-4">
                <img
                    src="https://www.allrecipes.com/thmb/nfsxdMIw15rqnVtl5LllGZe0KkY=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/40399-The-Best-Meatballs-ddmfs-4x3-080-858db61ac9d645b4880adf6417035ad0.jpg">
                <h2 class="text-xl font-bold">Card {{ index }}</h2>
                <p class="text-gray-600">This is some content for the card.</p>
                <button class="bg-blue-500 p-2 rounded-md flex items-center justify-center mx-auto">Add</button>
            </div>
        </div>
    </div>

</template>