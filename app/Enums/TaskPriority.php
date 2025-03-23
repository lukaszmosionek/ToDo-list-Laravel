<?php

namespace App\Enums;


class TaskPriority
{
    const LOW = 'low';
    const MEDIUM = 'medium';
    const HIGH = 'high';

    public static function map() : array
    {
        return [
            static::LOW,
            static::MEDIUM,
            static::HIGH,
        ];
    }
}
