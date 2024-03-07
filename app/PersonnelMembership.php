<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonnelMembership extends Model
{
    protected $fillable = [
        'personnel_information_id',
        'membership',
    ];
}
