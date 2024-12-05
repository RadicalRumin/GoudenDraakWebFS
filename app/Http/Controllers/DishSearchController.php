<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class DishSearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $dishes = Dish::query()
            ->where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get(['id', 'category_id', 'description', 'name']);

        return inertia('Kassa/Kassa', [
            'dishes' => $dishes,
        ]);
    }
}
