<?php

namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;
use App\Models\Dish;

class DishSearch extends Facade
{
    public static function getFacadeAccessor()
    {
        return \App\Support\Facades\DishSearch::class;
    }

    public static function search($query)
    {
        $dishes = Dish::query()
            ->select('dishes.id', 'categories.name as category_name', 'dishes.description', 'dishes.name', 'dishes.price')
            ->join('categories', 'dishes.category_id', '=', 'categories.id')
            ->where('dishes.name', 'like', "%{$query}%")
            ->orWhere('dishes.description', 'like', "%{$query}%")
            ->orWhere('dishes.id', 'like', "%{$query}%")
            ->orWhere('categories.name', 'like', "%{$query}%")
            ->get();

        return $dishes;
    }
}
