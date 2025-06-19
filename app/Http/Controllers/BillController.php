<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Dish;
use App\Models\Table;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;

class BillController extends Controller
{
    public function showBill($request)
    {
        $cookie = $request->cookie('restaurant_auth');
        dd($cookie);
        if (!$cookie) {
            return response('No cookie found')->setStatusCode(400);
        }

        $data = json_decode($cookie, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response('Invalid JSON in cookie', 400);
        }

        $lastOrderDate = Carbon::parse($data['lastOrderDate']) ?? null;
        $initialOrderDate = Carbon::parse($data['initialOrderDate']) ?? null;

        // Generate QR code as base64
        $qrCodePng = QrCode::format('png')
            ->size(200)
            ->generate('https://review.' . parse_url(config('app.url'), PHP_URL_HOST));

        $qrCodeBase64 = 'data:image/png;base64,' . base64_encode($qrCodePng);

        $query = Order_Dish::query();

        if ($initialOrderDate && $lastOrderDate) {
            $query->whereBetween('created_at', [$initialOrderDate->startOfDay(), $lastOrderDate->endOfDay()]);
        } elseif ($initialOrderDate) {
            $query->where('created_at', '>=', $initialOrderDate->startOfDay());
        } elseif ($lastOrderDate) {
            $query->where('created_at', '<=', $lastOrderDate->endOfDay());
        }

        $orderDishes = $query->get();
        $orderTotal = collect($orderDishes)->sum('price');

        // Render Inertia page
        return Inertia::render('Restaurant/BillPage', [
            'orderTotal' => $orderTotal,
            'orderItems' => $orderDishes,
            'qrCodeBase64' => $qrCodeBase64,
        ])->withCookie(Cookie::forget('restaurant_auth'));
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