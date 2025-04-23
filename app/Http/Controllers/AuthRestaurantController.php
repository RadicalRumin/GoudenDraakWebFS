<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class AuthRestaurantController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        return Inertia::render('Restaurant/Auth');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate
        $credentials = $request->validate([
            'tableId' => 'required|string',
        ]);




        // Search if table exists and isn`t paired already

        // Connect the table and set it in storage you are paired with the table



        return Inertia::render('Restaurant/Auth');
    }
}
