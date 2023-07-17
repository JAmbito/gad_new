<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonnelChildren extends Model
{
    protected $fiilable = [
        'personnel_id',
        'children_name',
        'children_sex',
        'children_birthday',
        'children_disability',
    ];
}
