<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class BillController extends Controller
{
    public function generateBill()
    {
        // Generate the QR code in PNG format
        $qrCodeImage = QrCode::format('png')
            ->size(200)
            ->generate('https://review.' . parse_url(config('app.url'), PHP_URL_HOST));

        // Save the QR code image to a temporary location as PNG
        $qrCodePath = 'qrcodes/review_qr_code.png';
        Storage::disk('public')->put($qrCodePath, $qrCodeImage);

        // Get the full URL for the saved PNG file
        $qrCodeUrl = storage_path('app/public/' . $qrCodePath);

        //get orders from table
        $orders = Table::find(1)->Orders;
        $orderTotal = 0;
        foreach($orders as $orderItem) {
            $orderTotal += $orderItem->price;
        }


        // Create PDF from the view and pass the URL of the QR code image
        $bill = Pdf::loadView('BillTemplate', [
            'orderTotal'=> $orderTotal,
            'orderItems' => $orders,
            'qrCodeUrl' => $qrCodeUrl,
        ]);

        return $bill->download('bill.pdf'); // Force download
    }
}
