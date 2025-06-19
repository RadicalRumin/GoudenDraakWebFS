<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DishCheckoutRestaurantController extends Controller
{
    public function index()
    {
        return Inertia::render('Restaurant/Checkout');
    }

    public function store(Request $request)
    {
        return to_route('dish-overview.index')->with('success', 'Dishes created');

        $value = $request->session()->get('key');



        // TODO Validate with if i can order the 10 minutes are done
        // TODO Add the order to the sessions
        // TODO Check if still have the 5 orders left
    }
}
