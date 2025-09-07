<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use App\Models\Vehicle;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $employees = Employee::factory(10)->create();
        $services = Service::factory(10)->create();
        $customers = Customer::factory(100)->create();

        // Create 100 orders reusing existing customers, vehicles and services
        $orders = collect();
        for ($i = 0; $i < 1000; $i++) {
            $customer = $customers->random();
            $service = $services->random();

            // Ensure the vehicle belongs to the chosen customer to avoid creating new customers via VehicleFactory
            $vehicle = Vehicle::factory()->for($customer)->create();

            $orders->push(
                Order::factory()
                    ->for($vehicle)
                    ->for($service)
                    ->for($customer)
                    ->create()
            );
        }

        // Create 50 designations linked to existing employees and orders to avoid creating new orders (and cascading customers)
        for ($i = 0; $i < 900; $i++) {
            Designation::factory()
                ->for($employees->random())
                ->for($orders->random())
                ->create();
        }
    }
}
