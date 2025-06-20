<template>
    <div>
        <h1 class="text-2xl font-bold mb-4">Dishes</h1>
        <input type="text" v-model="search" @input="fetchResults" placeholder="Search dishes..."
            class="mb-4 p-2 border rounded" />

        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-5" href="/menu/pdf">Download Menu PDF</a>

        <div class="w-full grid grid-cols-[auto] gap-4">
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
                    <!-- Favorites first -->
                    <tr v-for="dish in sortedResults.filter(d => isFavorite(d.id))" 
                        class="bg-white border-b hover:bg-gray-50 bg-yellow-50">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.id }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.categoryName }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.dishName }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">€{{ dish.price }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <font-awesome-icon class="cursor-pointer w-4 h-4 text-yellow-600"
                            :icon="['fas', 'star']" @click="removeFromFavorites(dish)"/>
                        </td>
                    </tr>
                    
                    <!-- Non-favorites -->
                    <tr v-for="dish in sortedResults.filter(d => !isFavorite(d.id))" 
                        class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.id }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.categoryName }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ dish.dishName }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">€{{ dish.price }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <font-awesome-icon class="cursor-pointer w-4 h-4 text-gray-400 hover:text-yellow-600"
                            :icon="['fas', 'star']" @click="addToFavorites(dish)"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue';
import { Dish } from '@/Models/dish';
import { router } from '@inertiajs/vue3';

const search = ref(getQueryParam('query') || "");
const props = defineProps<{ dishes: Dish[] }>()
const results = ref<Dish[]>(props.dishes);
const loading = ref(false);
const favoriteIds = ref<string[]>([]);

// Get sorted results with favorites first
const sortedResults = computed(() => {
    return [...results.value].sort((a, b) => {
        const aIsFavorite = isFavorite(a.id);
        const bIsFavorite = isFavorite(b.id);
        
        if (aIsFavorite && !bIsFavorite) return -1;
        if (!aIsFavorite && bIsFavorite) return 1;
        return 0;
    });
});

// Initialize favorites from cookie
onMounted(() => {
    loadFavoritesFromCookie();
});

function loadFavoritesFromCookie() {
    const cookie = document.cookie
        .split('; ')
        .find(row => row.startsWith('favoriteDishes='));
    
    if (cookie) {
        try {
            favoriteIds.value = JSON.parse(decodeURIComponent(cookie.split('=')[1])) || [];
        } catch (e) {
            favoriteIds.value = [];
        }
    }
}

function saveFavoritesToCookie() {
    const cookieValue = encodeURIComponent(JSON.stringify(favoriteIds.value));
    document.cookie = `favoriteDishes=${cookieValue}; path=/; max-age=${60 * 60 * 24 * 365}`; // 1 year
}

function isFavorite(dishId: string): boolean {
    return favoriteIds.value.includes(dishId);
}

function addToFavorites(dish: Dish) {
    if (!isFavorite(dish.id)) {
        favoriteIds.value.push(dish.id);
        saveFavoritesToCookie();
    }
}

function removeFromFavorites(dish: Dish) {
    favoriteIds.value = favoriteIds.value.filter(id => id !== dish.id);
    saveFavoritesToCookie();
}

function fetchResults() {
    loading.value = true;
    router.get('/menu/search', { query: search.value }, {
        preserveState: true,
        only: ['dishes'],
        onSuccess: (page) => {
            results.value = page.props.dishes as Dish[];
            loading.value = false;
        },
    });
    console.log(props.dishes);
};

function getQueryParam(param: string) {
    if (typeof window === 'undefined') return '';
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}
</script>