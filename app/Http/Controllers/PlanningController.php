<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Inertia\Inertia;

class PlanningController extends Controller
{
    public function index(Date $date = Date::now()) 
    {
        return Inertia::render('Planning/Index');
    }


    public function save()
    {
        // Save the planning
    }


}
