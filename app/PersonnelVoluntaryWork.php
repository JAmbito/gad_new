<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonnelVoluntaryWork extends Model
{
    protected $fillable = [
        'personnel_id',
        'voluntary_name',
        'voluntary_address',
        'voluntary_from',
        'voluntary_to',
        'voluntary_hours',
        'voluntary_position',
    ];
}
