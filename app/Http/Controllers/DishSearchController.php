<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class DishSearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query', '');
        $dishes = Dish::query()
            ->select('dishes.id', 'categories.name as category_name', 'dishes.description', 'dishes.name', 'dishes.price')
            ->join('categories', 'dishes.category_id', '=', 'categories.id')
            ->where('dishes.name', 'like', "%{$query}%")
            ->orWhere('dishes.description', 'like', "%{$query}%")
            ->orWhere('dishes.id', 'like', "%{$query}%")
            ->orWhere('categories.name', 'like', "%{$query}%")
            ->get();

        // Format the dishes
        $dishes = $dishes->map(function ($dish) {
            return [
                'id' => $dish->id,
                'categoryName' => $dish->category_name,
                'dishName' => $dish->name,
                'description' => $dish->description,
                'price' => $dish->price,
            ];
        });

        return inertia('Kassa/Kassa', [
            'dishes' => $dishes,
        ]);
    }
}
