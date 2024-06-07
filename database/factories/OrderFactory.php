<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'order_item_id' => OrderItem::factory(),
            'status' => $this->faker->randomElement(['pending', 'completed']),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'payment_method' => $this->faker->randomElement(['credit card', 'paypal']),
            'payment_status' => $this->faker->randomElement(['paid', 'unpaid']),
        ];
    }
}
