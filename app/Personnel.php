<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personnel extends Model
{
    use SoftDeletes;

    protected $fillable = [
            'id',
            'firstname',
            'middlename',
            'lastname',
            'extension',
            'birthday',
            'birth_place',
            'designation_id',
            'department_id',
            'academic_rank_id',
            'administrative_rank_id',
            'employee_status',
            'campus_id',
            'sex',
            'civil_status',
            'height',
            'weight',
            'blood',
            'gsis',
            'pagibig',
            'philhealth',
            'sss',
            'tin',
            'id_no',
            'citizenship',
            'by_birth',
            'dual_indication',
            'residential_lot_no',
            'residential_street',
            'residential_subdivision',
            'residential_barangay',
            'residential_city',
            'residential_province',
            'residential_zipcode',
            'permanent_lot_no',
            'permanent_street',
            'permanent_subdivision',
            'permanent_barangay',
            'permanent_city',
            'permanent_province',
            'permanent_zipcode',
            'tel_no',
            'mobile_no',
            'email',
            'status',
            'created_by',
            'reviewed_by',
    ];

    public function academic_rank()
    {
        return $this->belongsTo(AcademicRank::class, 'academic_rank_id');
    }

    public function administrative_rank()
    {
        return $this->belongsTo(Administrative_rank::class, 'administrative_rank_id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }

    public function family()
    {
        return $this->hasMany(PersonnelFamily::class);
    }

    public function children()
    {
        return $this->hasMany(PersonnelChildren::class);
    }

    public function question()
    {
        return $this->hasMany(PersonnelQuestionaire::class);
    }

    public function educational()
    {
        return $this->hasMany(PersonnelEducational::class);
    }

    public function reference()
    {
        return $this->hasMany(PersonnelReference::class);
    }

    public function government()
    {
        return $this->hasMany(PersonnelGovernmentIssued::class);
    }

    public function service()
    {
        return $this->hasMany(PersonnelService::class);
    }

    public function work()
    {
        return $this->hasMany(PersonnelWork::class);
    }

    public function voluntary()
    {
        return $this->hasMany(PersonnelVoluntaryWork::class);
    }

    public function learning()
    {
        return $this->hasMany(PersonnelLearning::class);
    }

    public function hobby()
    {
        return $this->hasMany(PersonnelHobbies::class);
    }

    public function academic()
    {
        return $this->hasMany(PersonnelNonAcademic::class);
    }

    public function membership()
    {
        return $this->hasMany(PersonnelMembership::class);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function reviewed_by()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
