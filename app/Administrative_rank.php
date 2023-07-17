<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Administrative_rank extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'administrative_rank'
    ];
}
