<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonnelLearning extends Model
{
    protected $fillable = [
        'personnel_information_id',
        'learning_training',
        'learning_from',
        'learning_to',
        'learning_hours',
        'learning_id_type',
        'learning_sponsored',
    ];
}
