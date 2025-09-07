<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Service;
use App\Models\Vehicle;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'vehicle_id' => Vehicle::factory(),
            'service_id' => Service::factory(),
            'customer_id' => Customer::factory(),
            'status' => fake()->randomElement(["pending","completed","in_progress", "cancelled"]),
            'price' => fake()->randomFloat(2, 0, 150000.00),
            'date' => fake()->date(),
        ];
    }
}
