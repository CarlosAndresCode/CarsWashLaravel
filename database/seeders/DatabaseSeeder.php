<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
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

        Employee::factory(10)->create();
        Service::factory(10)->create();
        Customer::factory(10)->create();
        Order::factory(10)->create();
        Designation::factory(10)->create();
    }
}
