<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonnelNonAcademic extends Model
{
    protected $fillable = [
        'personnel_id',
        'others_non_academic',
    ];
}
