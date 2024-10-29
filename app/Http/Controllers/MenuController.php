<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;

class MenuController extends Controller
{
    public function generatePdf()
    {
        $menuItems = Dish::all(); // Fetch your menu items from the database

        $pdf = Pdf::loadView('MenuTemplate', compact('menuItems')); // Create PDF from the view

        return $pdf->download('menu.pdf'); // Force download
    }
}
