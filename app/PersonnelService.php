<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonnelService extends Model
{
    protected $fillable = [
        'personnel_information_id',
        'service_career',
        'service_rating',
        'service_exam_date',
        'service_exam_place',
        'service_license',
        'service_license_date',
    ];
}
