<?php

namespace App\Support;

class StatusSupport
{
    public const STATUS_PENDING = 0;
    public const STATUS_ONHOLD = 1;
    public const STATUS_REJECTED = 2;
    public const STATUS_APPROVED = 3;

    public static function getLabelByStatus($status): string
    {
        switch ($status) {
            case self::STATUS_APPROVED:
                return 'approved';
            case self::STATUS_PENDING:
                return 'pending';
            case self::STATUS_ONHOLD:
                return 'on-hold';
            case self::STATUS_REJECTED:
                return 'rejected';
        }

        return '';
    }
}
