<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonnelGovernmentIssued extends Model
{
    protected $fillable = [
        'personnel_information_id',
        'government_issued_id',
        'government_issued_passport',
        'government_date_issuance',
        'government_place_issuance',
        'government_issued_image',
        'government_issued_appointment',
    ];
}
