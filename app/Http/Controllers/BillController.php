<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class BillController extends Controller
{
    public function generateBill()
    {
        $qrCodeImage = QrCode::format('png')
            ->size(200)
            ->generate('https://review.' . parse_url(config('app.url'), PHP_URL_HOST));

        // Save the QR code image to a temporary location
        $qrCodePath = 'qrcodes/review_qr_code.png';
        Storage::disk('public')->put($qrCodePath, $qrCodeImage);

        $orders = []; // Fetch your orders from the database

        $bill = Pdf::loadView('BillTemplate', [
            'qrCodePath' => Storage::url($qrCodePath),
        ]); // Create PDF from the view

        return $bill->download('bill.pdf'); // Force download
    }
}
