<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DishOverviewRestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Restaurant/Dishes');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

}
