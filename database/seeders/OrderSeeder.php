<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Table;
use App\Models\Order_Dish;
use App\Models\Dish;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample tables
        $tables = Table::factory()->count(5)->create();

        // Create sample dishes
        $dishes = Dish::factory()->count(10)->create();

        // Create orders and associate them with tables and dishes
        foreach ($tables as $table) {
            // Generate a random number of orders for each table
            $orders = Order::factory()->count(rand(1, 5))->create([
                'table_id' => $table->id,
            ]);

            foreach ($orders as $order) {
                // Associate random dishes with each order
                foreach ($dishes->random(rand(1, 5)) as $dish) {
                    Order_Dish::create([
                        'order_id' => $order->id,
                        'dish_id' => $dish->id,
                        'quantity' => rand(1, 5),
                        'remark' => fake()->sentence(),
                    ]);
                }
            }
        }
    }
}
