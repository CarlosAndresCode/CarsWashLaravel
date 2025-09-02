<?php

namespace App\Enum;

enum StatusOrder: string
{
    case PENDING = 'pending';
    case IN_PROGRESS= 'in_progress';
    case COMPLETED= 'completed';
    case CANCELLED=  'cancelled';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::IN_PROGRESS => 'In Progress',
            self::COMPLETED => 'Completed',
            self::CANCELLED => 'Cancelled',
        };
    }

    public function badge(): string
    {
        $class = match ($this) {
            self::PENDING => 'text-bg-warning',
            self::IN_PROGRESS => 'text-bg-primary',
            self::COMPLETED => 'text-bg-success',
            self::CANCELLED => 'text-bg-danger',
        };

        return sprintf('<span class="badge rounded-pill %s">%s</span>', $class, $this->label());
    }
}
