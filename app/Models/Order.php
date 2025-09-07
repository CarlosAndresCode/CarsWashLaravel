<?php

namespace App\Models;

use App\Enum\StatusOrder;
use App\Collection\OrderCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[CollectedBy(OrderCollection::class)]
class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vehicle_id',
        'service_id',
        'customer_id',
        'status',
        'price',
        'date',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'vehicle_id' => 'integer',
            'service_id' => 'integer',
            'customer_id' => 'integer',
            'price' => 'decimal:2',
            'date' => 'date',
            'status' => StatusOrder::class
        ];
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function designation(): HasOne
    {
        return $this->HasOne(Designation::class);
    }
}
