<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonnelVersion extends Model
{
    protected $fillable = [
        'personnel_id',
        'personnel_information_id',
        'is_current',
        'version',
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'personnel_id');
    }

    public function personnel_information(): BelongsTo
    {
        return $this->belongsTo(PersonnelInformation::class);
    }
}
