<?php

namespace App\Enums;


class TaskStatus
{
    const IN_PROGRESS = 'in_progress';
    const TO_DO = 'to_do';
    const DONE = 'done';

    public static function map() : array
    {
        return [
            static::IN_PROGRESS,
            static::TO_DO,
            static::DONE,
        ];
    }
}
