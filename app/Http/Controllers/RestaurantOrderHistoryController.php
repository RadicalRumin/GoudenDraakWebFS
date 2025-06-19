<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Dish;

class RestaurantOrderHistoryController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Restaurant/OrderHistory');
    }
}
