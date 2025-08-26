<?php

namespace App\Enum;

/**
 * PHP backed Enum for Service type.
 *
 * Usage in Eloquent: add a cast in the Service model
 *   protected function casts(): array { return ['type_service' => TypeService::class]; }
 */
enum TypeService: string
{
    case CAR = 'car';
    case MOTORCYCLE = 'motorcycle';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function label(): string
    {
        return match ($this) {
            self::CAR => 'Car',
            self::MOTORCYCLE => 'Motorcycle',
        };
    }

    /**
     * Returns a Bootstrap 5 badge HTML for the enum value.
     */
    public function badge(): string
    {
        $class = match ($this) {
            self::CAR => 'text-bg-success',
            self::MOTORCYCLE => 'text-bg-primary',
        };

        return sprintf('<span class="badge rounded-pill %s">%s</span>', $class, $this->label());
    }
}
