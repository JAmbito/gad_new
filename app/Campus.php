<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campus extends Model
{
    use SoftDeletes;

    public static ?string $currentCampusId = null;

    protected $fillable = [
        'campus_name',
        'campus_access',
        'detailed_address',
        'province',
        'city',
        'barangay',
        'zip_code',
        'email',
        'tel_no',
        'mobile_no',
        'image',
    ];
}
