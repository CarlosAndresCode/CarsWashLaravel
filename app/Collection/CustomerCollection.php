<?php

namespace App\Collection;

use Illuminate\Database\Eloquent\Collection;

class CustomerCollection extends Collection
{
    public function totalCustomers(): int
    {
        return $this->count();
    }
}
