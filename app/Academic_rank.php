<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Academic_rank extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'academic_rank'
    ];
}
