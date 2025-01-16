<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class OrdersExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        $data = Order::query()
            ->whereDate('orders.created_at', today())
            ->join('Order_Dishes', 'orders.id', '=', 'Order_Dishes.order_id')
            ->join('Dishes', 'Order_Dishes.dish_id', '=', 'Dishes.id')
            ->selectRaw('
                Dishes.name as dish_name, 
                SUM(Order_Dishes.quantity) as total_quantity, 
                SUM(Order_Dishes.quantity * Dishes.price) as revenue
            ')
            ->groupBy('Dishes.id')
            ->get();

        // Calculate total revenue and append
        $totalRevenue = $data->sum('revenue');
        $dataArray = $data->toArray();
        $dataArray[] = [
            'dish_name' => 'Total Revenue',
            'total_quantity' => '',
            'revenue' => $totalRevenue,
        ];

        return collect($dataArray);
    }

    public function headings(): array
    {
        return [
            'Dish Name',
            'Total Quantity',
            'Revenue',
        ];
    }
}
