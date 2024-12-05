<template>
    <div>
        <h1 class="text-2xl font-bold mb-4">Dishes</h1>
        <input type="text" v-model="search" placeholder="Search dishes..." class="mb-4 p-2 border rounded" />

        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">Nummer</th>
                    <th scope="col" class="px-6 py-3">Naam</th>
                    <th scope="col" class="px-6 py-3">Prijs</th>
                    <th scope="col" class="px-6 py-3">
                        <a href="/dishes/create">
                            <button
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 focus:outline-none"
                                type="button">Create
                            </button>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="dish in results" class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish . name }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish . description }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish . id }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup lang="ts">
    import { computed, onMounted, ref, watch} from 'vue';
    import { Dish} from '@/Models/dish';
    import { router } from '@inertiajs/vue3';

    const search = ref("");
    const props = defineProps<{dishes: Dish[]}>()
    const results = ref<Dish[]>(props.dishes);
    const loading = ref(false);

    // function fetchResults() {
    //     loading.value = true;
    //     router.get(route())
    // };



    // const fetchDishes = async (searchItem: string = '') => {
    //     try {
    //         const response = await fetch(`/getdishes/?search=${encodeURIComponent(searchItem)}`);
    //         if (!response.ok) {
    //             throw new Error('Network response was not ok');
    //         }
    //         const data = await response.json();
    //         console.log(`before update dishes: ${JSON.stringify(dishes.value)}`);
    //         dishes.value = [...data.map((dish: DishItem) => ({
    //             ...dish,
    //             name: dish.name.toLowerCase(),
    //         }))];
    //         console.log(`after update dishes: ${JSON.stringify(dishes.value)}`);
    //     } catch (error) {
    //         console.error('Error fetching dishes:', error);
    //     }
    // };

    // const debouncedFetchDishes = debounce(fetchDishes, 500);

    // watch(search, (searchItem) => {
    //     debouncedFetchDishes(searchItem);
    // });

    // onMounted(() => {
    //     fetchDishes();
    // });

    // const filteredDishes = computed(() => {
    //     return dishes.value;
    // });
</script>
