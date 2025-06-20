<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\Console\Isolatable;

class ExportDailyOrders extends Command implements Isolatable
{

    protected $signature = 'orders:export-daily';
    protected $description = 'Command description';


    public static function handle()
    {
        $fileName = 'orders-' . now()->format('Y-m-d') . '.xlsx';
        $path = 'orders/' . $fileName;

        // Store the file in the 'public/orders' directory
        Excel::store(new OrdersExport, $path, 'public');
    }
}
