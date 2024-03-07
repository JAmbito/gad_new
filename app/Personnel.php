<?php

namespace App;

use App\Support\StatusSupport;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    //
    public static function currentVersion($campusId = null)
    {
        if ($campusId) {
            $personnelVersion = PersonnelVersion::whereHas('personnel_information', function ($q2) use ($campusId) {
                $q2->where('campus_id', $campusId);
            })->where('is_current', true)->with(
                'personnel_information',
                'personnel_information.reviewed_by',
                'personnel_information.created_by',
                'personnel_information.academic_rank',
                'personnel_information.administrative_rank',
                'personnel_information.designation',
                'personnel_information.department',
                'personnel_information.campus'
            );
        } else {
            $personnelVersion = PersonnelVersion::where('is_current', true)->with(
                'personnel_information',
                'personnel_information.reviewed_by',
                'personnel_information.created_by',
                'personnel_information.academic_rank',
                'personnel_information.administrative_rank',
                'personnel_information.designation',
                'personnel_information.department',
                'personnel_information.campus'
            );
        }

        return $personnelVersion;
    }

    public static function getByPersonnelInformationId($id)
    {
        $personnelVersion = PersonnelVersion::where('personnel_information_id', $id)->with(
            'personnel_information',
            'personnel_information.reviewed_by',
            'personnel_information.created_by',
            'personnel_information.academic_rank',
            'personnel_information.administrative_rank',
            'personnel_information.designation',
            'personnel_information.department',
            'personnel_information.campus',
            'personnel_information.family',
            'personnel_information.question',
            'personnel_information.reference',
            'personnel_information.government',
            'personnel_information.children',
            'personnel_information.educational',
            'personnel_information.service',
            'personnel_information.work',
            'personnel_information.voluntary',
            'personnel_information.learning',
            'personnel_information.hobby',
            'personnel_information.academic',
            'personnel_information.membership'
        );

        return $personnelVersion;
    }

    public static function getOneforReviewVersion($id)
    {
        $personnelVersion = self::whereHas('personnel_versions', function ($q) use ($id) {
            $q->whereHas('personnel_information', function ($q2) use ($id) {
                $q2->where('id', $id)->whereNotIn('status', StatusSupport::ALL_REVIEWED_STATUSES);
            });
        })->with(
            'personnel_versions.personnel_information',
            'personnel_versions.personnel_information.reviewed_by',
            'personnel_versions.personnel_information.created_by',
            'personnel_versions.personnel_information.academic_rank',
            'personnel_versions.personnel_information.administrative_rank',
            'personnel_versions.personnel_information.designation',
            'personnel_versions.personnel_information.department',
            'personnel_versions.personnel_information.campus'
        );

        return $personnelVersion;
    }
    public static function forReviewVersion($campusId = null)
    {
        if ($campusId) {
            $personnelVersion = PersonnelVersion::whereHas('personnel_information', function ($q) use ($campusId) {
                $q->whereIn('status', StatusSupport::ALL_REVIEWABLE_STATUSES)->where('campus_id', $campusId);
            })->where('is_current', false)->with(
                'personnel_information',
                'personnel_information.reviewed_by',
                'personnel_information.created_by',
                'personnel_information.academic_rank',
                'personnel_information.administrative_rank',
                'personnel_information.designation',
                'personnel_information.department',
                'personnel_information.campus'
            );
        } else {
            $personnelVersion = PersonnelVersion::whereHas('personnel_information', function ($q) {
                $q->whereIn('status', StatusSupport::ALL_REVIEWABLE_STATUSES);
            })->where('is_current', false)->with(
                'personnel_information',
                'personnel_information.reviewed_by',
                'personnel_information.created_by',
                'personnel_information.academic_rank',
                'personnel_information.administrative_rank',
                'personnel_information.designation',
                'personnel_information.department',
                'personnel_information.campus'
            );
        }

        return $personnelVersion;
    }

    public function personnel_versions()
    {
        return $this->hasMany(PersonnelVersion::class);
    }
}
