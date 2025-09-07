<?php

namespace App\Collection;

class OrderCollection extends \Illuminate\Database\Eloquent\Collection
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
        return $this->avg('price');
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
