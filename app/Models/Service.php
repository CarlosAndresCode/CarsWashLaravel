<?php

namespace App\Models;

use App\Enum\TypeService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'type_service',
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
            'price' => 'decimal:2',
            'type_service' => TypeService::class,
        ];
    }

    public function getFormattedPriceAttribute(): string
    {
        return '$ ' . number_format($this->price, 0 , ',', '.');
    }
}
