<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Table;
use App\Models\Order_Dish;
use App\Models\Dish;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BillController extends Controller
{
    public function generateBill(Request $request)
    {
        // Validate the request data
        $request->validate([
            'table_id' => 'required|exists:tables,id',
        ]);
        // Get the table ID from the request
        $tableId = $request->input('table_id');

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
        $orders = Table::find($tableId)->Orders;
        $dishes = Order_Dish::with('Dish')->whereIn('order_id', $orders->pluck('id'))->get();



        $orderTotal = 0;
        foreach($dishes as $orderItem) {
            Log::info('Order Item: ', ['item' => $orderItem]);
            // Assuming each dish has a price and quantity
            Log::info('Dish Quantity: ', ['quantity' => $orderItem->quantity]);


            $orderTotal += $orderItem->dish->price * $orderItem->quantity;
        }


        // Create PDF from the view and pass the URL of the QR code image
        $bill = Pdf::loadView('BillTemplate', [
            'orderTotal'=> $orderTotal,
            'orderItems' => $dishes,
            'qrCodeUrl' => $qrCodeUrl,
        ]);

        return $bill->download('bill.pdf'); // Force download
    }
}
