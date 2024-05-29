<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmploymentStatus extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'employment_status',
    ];
}
