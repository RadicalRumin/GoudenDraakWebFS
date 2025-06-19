<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Inertia\Inertia;
use Illuminate\Http\Request;
class DishOverviewRestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query', '');
        $dishes = Dish::query()
            ->select('dishes.id', 'categories.name as category_name', 'dishes.description', 'dishes.name')
            ->join('categories', 'dishes.category_id', '=', 'categories.id')
            ->where('dishes.name', 'like', "%{$query}%")
            ->orWhere('dishes.description', 'like', "%{$query}%")
            ->orWhere('dishes.id', 'like', "%{$query}%")
            ->orWhere('categories.name', 'like', "%{$query}%")
            ->get();

        $sideDishes = Dish::query()
            ->select('dishes.id', 'categories.name as category_name', 'dishes.description', 'dishes.name')
            ->join('categories', 'dishes.category_id', '=', 'categories.id')
            ->where('categories.name', 'like', "%Bijgerechten%")
            ->get();

        // Format the side dishes
        $sideDishes = $sideDishes->map(function ($dish) {
            return [
                'id' => $dish->id,
                'categoryName' => $dish->category_name,
                'dishName' => $dish->name,
                'description' => $dish->description,
            ];
        });

        // Format the dishes
        $dishes = $dishes->map(function ($dish) {
            return [
                'id' => $dish->id,
                'categoryName' => $dish->category_name,
                'dishName' => $dish->name,
                'description' => $dish->description,
            ];
        });

        return Inertia::render('Restaurant/Dishes', [
            'dishes' => $dishes,
            'sideDishes' => $sideDishes,
        ]);
    }

    /**
     * Add a new Dish to the list
     */
    public function store(Request $request)
    {
        // Validate
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        // Business logic


        // Side effects
    }

}
