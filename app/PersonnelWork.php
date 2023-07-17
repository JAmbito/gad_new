<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonnelWork extends Model
{
    protected $fillable = [
        'personnel_id',
        'work_from',
        'work_to',
        'work_position',
        'work_agency',
        'work_salary',
        'work_pay_grade',
        'work_appointment',
        'work_gov_service',
    ];
}
