<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'designation',
        'management_type_id'
    ];

    public function management_type()
    {
        return $this->belongsTo(ManagementType::class, 'management_type_id');
    }
}
