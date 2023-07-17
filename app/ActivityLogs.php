<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLogs extends Model
{
    protected $fillable = [
        'title',
        'action',
        'details',
        'created_by',
        'updated_by'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
