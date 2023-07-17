<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonnelFamily extends Model
{
    protected $fillable = [
        'personnel_id',
        'spouse_firstname',
        'spouse_middlename',
        'spouse_lastname',
        'spouse_extension',
        'spouse_occupation',
        'spouse_business_name',
        'spouse_business_address',
        'spouse_tel_no',
        'father_firstname',
        'father_middlename',
        'father_lastname',
        'father_extension',
        'mother_maiden_name',
        'mother_firstname',
        'mother_middlename',
        'mother_lastname',
        'mother_extension',
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'personnel_id');
    }
}
