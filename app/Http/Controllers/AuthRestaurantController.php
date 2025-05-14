<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Cookie;

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

        if($password === $envPassword){
            $request->session()->regenerate();
            $cookie = Cookie::make('restaurant_auth', true, 60, '/');

            $intended = session('intended');
            return redirect()->to($intended)->withCookie($cookie);
        }
        else {
            return back()->withErrors(['password' => 'Incorrect password']);
        }
    }
}
