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

export function addOrderHistory() {
    const orderHistory = localStorage.getItem('orderHistory');
    const orderHistoryArray = orderHistory ? JSON.parse(orderHistory) : [];
    orderHistoryArray.push({
        round: orderHistoryArray.length + 1,
        dishes: [...dishes],
        date: new Date().toISOString()
    });
    localStorage.setItem('orderHistory', JSON.stringify(orderHistoryArray));
}

export function getOrderHistory() {
    const orderHistory = localStorage.getItem('orderHistory');
    return orderHistory ? JSON.parse(orderHistory) : [];
}

export function clearOrderHistory() {
    localStorage.removeItem('orderHistory');
}