<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class BillController extends Controller
{
    public function showBill()
    {
        // Generate QR code as base64
        $qrCodePng = QrCode::format('png')
            ->size(200)
            ->generate('https://review.' . parse_url(config('app.url'), PHP_URL_HOST));

        $qrCodeBase64 = 'data:image/png;base64,' . base64_encode($qrCodePng);

        // Get orders
        $orders = Table::find(1)->orders;
        $orderTotal = collect($orders)->sum('price');

        // Render Inertia page
        return Inertia::render('Restaurant/BillPage', [
            'orderTotal' => $orderTotal,
            'orderItems' => $orders,
            'qrCodeBase64' => $qrCodeBase64,
        ]);
    }

    public function downloadBill()
    {
        $qrCodePng = QrCode::format('png')
            ->size(200)
            ->generate('https://review.' . parse_url(config('app.url'), PHP_URL_HOST));

        $qrCodePath = tempnam(sys_get_temp_dir(), 'qr_') . '.png';
        file_put_contents($qrCodePath, $qrCodePng);

        $orders = Table::find(1)->orders;
        $orderTotal = collect($orders)->sum('price');

        $bill = Pdf::loadView('BillTemplate', [
            'orderTotal' => $orderTotal,
            'orderItems' => $orders,
            'qrCodeUrl' => $qrCodePath,
        ]);

        return $bill->download('bill.pdf');
    }
}