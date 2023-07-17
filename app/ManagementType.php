<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManagementType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'management_type'
    ];
}
