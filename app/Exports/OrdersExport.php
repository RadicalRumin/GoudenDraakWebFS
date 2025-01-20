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
            ->join('order__dishes', 'orders.id', '=', 'order__dishes.order_id')
            ->join('dishes', 'order__dishes.dish_id', '=', 'dishes.id')
            ->selectRaw('
                dishes.name as dish_name, 
                SUM(order__dishes.quantity) as total_quantity, 
                SUM(order__dishes.quantity * dishes.price) as revenue
            ')
            ->groupBy('dishes.id')
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
