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


    public function generateBill($orders = [])
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

        
        $orderTotal = 0;
        foreach($orders as $orderItem) {
            $orderTotal += $orderItem->price;
        }
        
        $bill = app('dompdf.wrapper');
        $bill->getDomPDF()->set_option('enable_php', true);

        // Create PDF from the view and pass the URL of the QR code image
        $bill = Pdf::loadView('BillTemplate', [
            'orderTotal'=> $orderTotal,
            'orderItems' => $orders,
            'qrCodeUrl' => $qrCodeUrl,
        ]);

        // Save the PDF to a file
        // $billpath = 'bills/bill.pdf';
        // Storage::disk('public')->put($billpath, $bill->output());
        // $billUrl = Storage::temporaryUrl($billpath, now()->addMinutes(5));

        

        // Return the URL of the saved PDF file
        return $bill->stream();
        
    }

    public function kassaBill(Request $request)
    {
        $orders = $request->input('dishes', []);
        $dishes = (array)json_decode(json: $orders);
        $this->generateBill($dishes);
    }

    public function generateTableBill($orderId)
    {
        $orders = Table::find($orderId)->Orders;
        $this->generateBill($orders);
    }
}
