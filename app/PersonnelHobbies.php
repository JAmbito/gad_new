<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonnelHobbies extends Model
{
    protected $fillable = [
        'personnel_id',
        'hobby',
    ];
}
