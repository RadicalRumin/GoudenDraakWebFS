<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order_Dish;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order_Dish>
 */
class OrderDishFactory extends Factory
{
    protected $model = Order_Dish::class;

    public function definition(): array
    {
        return [
            'order_id' => null, // This will be set in the seeder
            'dish_id' => null,  // This will be set in the seeder
            'quantity' => $this->faker->numberBetween(1, 5),
            'remark' => $this->faker->sentence(),
        ];
    }
}
