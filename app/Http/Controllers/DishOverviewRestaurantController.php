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
    public function index()
    {
        $dishes = Dish::select('id', 'name', 'description', 'price');

        return Inertia::render('Restaurant/Dishes', [
            $dishes,
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
