<?php

namespace App\Support;

class StatusSupport
{
    public const STATUS_PENDING = 0;
    public const STATUS_ONHOLD = 1;
    public const STATUS_REJECTED = 2;
    public const STATUS_APPROVED = 3;

    public const ALL_REVIEWED_STATUSES = [
        self::STATUS_APPROVED,
        self::STATUS_REJECTED,
        self::STATUS_ONHOLD,
    ];

    public const ALL_REVIEWABLE_STATUSES = [
        self::STATUS_ONHOLD,
        self::STATUS_PENDING,
    ];

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
