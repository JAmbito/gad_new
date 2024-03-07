<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonnelEducational extends Model
{
    public const EDUCATION_LEVEL_ELEMENTARY = 'ELEMENTARY';
    public const EDUCATION_LEVEL_SECONDARY = 'SECONDARY';
    public const EDUCATION_LEVEL_VOCATIONAL = 'VOCATIONAL';
    public const EDUCATION_LEVEL_BACHELORS_DEGREE = 'BACHELORS DEGREE';
    public const EDUCATION_LEVEL_MASTERS_DEGREE = 'MASTERS DEGREE';
    public const EDUCATION_LEVEL_DOCTORATE_DEGREE = 'DOCTORATE DEGREE';

    public const ALL_TEACHING_EDUCATION_LEVELS = [
        self::EDUCATION_LEVEL_BACHELORS_DEGREE,
        self::EDUCATION_LEVEL_MASTERS_DEGREE,
        self::EDUCATION_LEVEL_DOCTORATE_DEGREE,
    ];

    public const ALL_EDUCATION_LEVELS = [
        self::EDUCATION_LEVEL_ELEMENTARY,
        self::EDUCATION_LEVEL_SECONDARY,
        self::EDUCATION_LEVEL_VOCATIONAL,
        self::EDUCATION_LEVEL_BACHELORS_DEGREE,
        self::EDUCATION_LEVEL_MASTERS_DEGREE,
        self::EDUCATION_LEVEL_DOCTORATE_DEGREE,
    ];

    protected $fillable = [
        'personnel_information_id',
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
