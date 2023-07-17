<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonnelEducational extends Model
{
    protected $fillable = [
        'personnel_id',
        'education_id',
        'education_level',
        'educational_school_name',
        'educational_course',
        'educational_from',
        'educational_to',
        'educational_units_earned',
        'educational_year_graduated',
        'educational_scholarship_class',
    ];
}
