<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManagementType extends Model
{
    use SoftDeletes;

    public const CLASSIFICATION_TEACHING = 'teaching';
    public const CLASSIFICATION_NON_TEACHING = 'non-teaching';
    public const CLASSIFICATION_OTHER = 'other';

    public const ALL_CLASSIFICATIONS = [
      self::CLASSIFICATION_TEACHING,
      self::CLASSIFICATION_NON_TEACHING,
      self::CLASSIFICATION_OTHER
    ];

    protected $fillable = [
        'management_type',
        'classification'
    ];
}
