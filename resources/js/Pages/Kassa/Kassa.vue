<template>
    <div>
        <h1 class="text-2xl font-bold mb-4">Dishes</h1>
        <input type="text" v-model="search" @input="fetchResults" placeholder="Search dishes..."
            class="mb-4 p-2 border rounded" />

        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">Nummer</th>
                    <th scope="col" class="px-6 py-3">Naam</th>
                    <th scope="col" class="px-6 py-3">Prijs</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="dish in results" class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.id }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.name }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.price }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup lang="ts">
    import { ref} from 'vue';
    import { Dish} from '@/Models/dish';
    import { router } from '@inertiajs/vue3';

    const search = ref("");
    const props = defineProps<{dishes: Dish[]}>()
    const results = ref<Dish[]>(props.dishes);
    const loading = ref(false);

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
</script>
