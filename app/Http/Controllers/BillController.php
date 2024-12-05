<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BillController extends Controller
{
    public function generateBill()
    {
        $orders = []; // Fetch your orders from the database

        $bill = Pdf::loadView('BillTemplate', compact('menuItems')); // Create PDF from the view

        return $bill->download('bill.pdf'); // Force download
    }
}
