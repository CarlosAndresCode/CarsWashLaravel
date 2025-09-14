<?php

namespace App\Collection;

use Illuminate\Database\Eloquent\Collection;

class OrderCollection extends Collection
{
    public function summaryOrders(): array
    {
        return [
            'totalOrders' => $this->totalOrders(),
            'averageOrderPrice' => $this->averageOrderPrice(),
            'averageOrderByEmployee' => $this->averageOrderByEmployee(),
        ];
    }
    public function totalOrders(): int
    {
        return $this->count();
    }

    public function averageOrderPrice(): float
    {
        return $this->avg('total');
    }

    public function averageOrderByEmployee(): float
    {
        if ($this->isEmpty()) {
            return 0;
        }

        $userOrderCount = $this->groupBy('customer_id')
            ->map(fn ($orders) => $orders->count());

        return $userOrderCount->avg();
    }
}
