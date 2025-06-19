import { Dish } from '@/Models/dish'
import { Reactive, reactive, ref } from 'vue'

const dishes: Reactive<Dish[]> = reactive([]);
export const orderTotal = ref(0)

export function addDishes(dish : Dish) {
    dishes.push(dish);
}

export function getDishes() {
    return dishes;
}

export function clearDishes(){
    dishes.splice(0);
}
