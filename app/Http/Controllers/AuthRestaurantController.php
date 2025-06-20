<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;

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
        $envPassword = env('TABLE_PASSWORD');
        $password = $request->input('password');
        $tableNumber = $request->input("tableId");

        // Create as array instead of collection
        $tableData = [
            'tableNumber' => $tableNumber,
            'initialOrderDate' => Carbon::now()->subMinutes(10)->toIso8601String(),
            'lastOrderDate' => Carbon::now()->subMinutes(10)->toIso8601String(),
            'rounds' => 1,
        ];

        if ($password === $envPassword) {
            $request->session()->regenerate();

            // Explicitly convert to JSON string
            $jsonValue = json_encode($tableData);

            $cookie = Cookie::make('restaurant_auth', $jsonValue, 60, '/', null, false, false);

            $intended = session('intended');
            return redirect()->to($intended)->withCookie($cookie);
        } else {
            return back()->withErrors(['password' => 'Incorrect password']);
        }
    }
}
