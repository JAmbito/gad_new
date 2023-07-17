<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonnelReference extends Model
{
    protected $fillable = [
        'personnel_id',
        'reference_name',
        'reference_address',
        'reference_tel_no',
    ];
}
