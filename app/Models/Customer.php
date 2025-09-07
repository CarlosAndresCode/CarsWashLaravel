<?php

namespace App\Models;

use App\Collection\CustomerCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\CollectedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[CollectedBy(CustomerCollection::class)]
class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone',
        'address',
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
        ];
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->last_name;
    }
}
