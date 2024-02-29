<?php

namespace App\Services;

use App\Campus;
use App\ManagementType;
use App\Personnel;
use App\PersonnelEducational;
use App\Support\RoleSupport;
use App\Support\StatusSupport;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportGeneratorService
{
    private function filterByCampus($model)
    {
        $roleName = Auth::user()->getRoleNames()[0];

        $campusId = Campus::$currentCampusId;
        if ($roleName === RoleSupport::ROLE_ADMINISTRATOR && !is_null($campusId)) {
            return $model->where('campus_id', $campusId);
        }

        return $model;
    }

    public function getTotalEmployeesByGender(): array
    {
        return array(
            'male' => $this->filterByCampus(Personnel::where('sex', 'MALE'))->count(),
            'female' => $this->filterByCampus(Personnel::where('sex', 'FEMALE'))->count()
        );
    }

    public function getTotalEmployeesByGenderByManagementType(): array
    {
        $maleByManagementType = [];
        $femaleByManagementType = [];
        foreach (ManagementType::all() as $managementType) {
            $maleByManagementType[$managementType->management_type] = $this->filterByCampus(Personnel::with('designation')
                ->whereHas('designation', function ($q) use ($managementType) {
                    $q->where('management_type_id', $managementType->id);
                })->where('sex', 'MALE'))->count();

            $femaleByManagementType[$managementType->management_type] = $this->filterByCampus(Personnel::with('designation')
                ->whereHas('designation', function ($q) use ($managementType) {
                    $q->where('management_type_id', $managementType->id);
                })->where('sex', 'FEMALE'))->count();
        }

        return array(
            'male' => $maleByManagementType,
            'female' => $femaleByManagementType
        );
    }

    public function getTotalDisabledEmployeesByGender(): array
    {
        return array(
            'male' => $this->filterByCampus(Personnel::with('question')->whereHas('question', function ($q) {
                $q->where('question_40b', 'yes');
            })->where('sex', 'MALE'))->count(),
            'female' => $this->filterByCampus(Personnel::with('question')->whereHas('question', function ($q) {
                $q->where('question_40b', 'yes');
            })->where('sex', 'FEMALE'))->count()
        );
    }

    public function getTotalIndigenousEmployeesByGender(): array
    {
        return array(
            'male' => $this->filterByCampus(Personnel::with('question')->whereHas('question', function ($q) {
                $q->where('question_40a', 'yes');
            })->where('sex', 'MALE'))->count(),
            'female' => $this->filterByCampus(Personnel::with('question')->whereHas('question', function ($q) {
                $q->where('question_40a', 'yes');
            })->where('sex', 'FEMALE'))->count(),
        );
    }

    public function getTotalSoloParentEmployeesByGender(): array
    {
        return array(
            'male' => $this->filterByCampus(Personnel::with('question')->whereHas('question', function ($q) {
                $q->where('question_40c', 'yes');
            })->where('sex', 'MALE'))->count(),
            'female' => $this->filterByCampus(Personnel::with('question')->whereHas('question', function ($q) {
                $q->where('question_40c', 'yes');
            })->where('sex', 'FEMALE'))->count()
        );
    }

    public function getTotalEmployeesWithYoungChildrenByGender(int $maximumAge): array
    {
        return array(
            'male' => $this->filterByCampus(Personnel::withCount('children')->whereHas('children', function ($q) use ($maximumAge) {
                $q->where(Db::raw("DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), children_birthday)), '%Y') + 0"), '<', $maximumAge);
            })->where('sex', 'MALE'))->count(),
            'female' => $this->filterByCampus(Personnel::withCount('children')->whereHas('children', function ($q) use ($maximumAge) {
                $q->where(Db::raw("DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), children_birthday)), '%Y') + 0"), '<', $maximumAge);
            })->where('sex', 'FEMALE'))->count()
        );
    }

    public function getTotalEmployeesWithDisabledChildrenByGender(): array
    {
        return array(
            'male' => $this->filterByCampus(Personnel::withCount('children')->whereHas('children', function ($q) {
                $q->where('children_disability', '!=', '')->where('children_disability', '!=', null);
            })->where('sex', 'MALE'))->count(),
            'female' => $this->filterByCampus(Personnel::withCount('children')->whereHas('children', function ($q) {
                $q->where('children_disability', '!=', '')->where('children_disability', '!=', null);
            })->where('sex', 'FEMALE'))->count()
        );
    }

    public function getTotalEmployeesByGenderByEmploymentStatus(): array
    {
        $maleByEmploymentStatus = [];
        $femaleByEmploymentStatus = [];
        foreach (Personnel::EMPLOYEE_STATUSES as $employmentStatus) {
            $maleByEmploymentStatus[$employmentStatus] = $this->filterByCampus(Personnel::where('employee_status', $employmentStatus)->where('sex', 'MALE'))->count();
            $femaleByEmploymentStatus[$employmentStatus] = $this->filterByCampus(Personnel::where('employee_status', $employmentStatus)->where('sex', 'FEMALE'))->count();
        }
        return array(
            'male' => $maleByEmploymentStatus,
            'female' => $femaleByEmploymentStatus,
        );
    }

    public function getTotalTeachingEmployeesByGenderByCivilStatus(): array
    {
        $teachingManagementTypes = ManagementType::where('classification', ManagementType::CLASSIFICATION_TEACHING)->get();

        $teachingMaleByCivilStatus = [];
        $teachingFemaleByCivilStatus = [];
        foreach ($teachingManagementTypes as $teachingManagementType) {
            foreach (Personnel::CIVIL_STATUSES as $civilStatus) {
                if (!isset($teachingMaleByCivilStatus[$civilStatus])) {
                    $teachingMaleByCivilStatus[$civilStatus] = 0;
                }
                $teachingMaleByCivilStatus[$civilStatus] += $this->filterByCampus(Personnel::with('designation')
                    ->whereHas('designation', function ($q) use ($teachingManagementType) {
                        $q->where('management_type_id', $teachingManagementType->id);
                    })->where('civil_status', $civilStatus)->where('sex', 'MALE'))->count();

                if (!isset($teachingFemaleByCivilStatus[$civilStatus])) {
                    $teachingFemaleByCivilStatus[$civilStatus] = 0;
                }
                $teachingFemaleByCivilStatus[$civilStatus] += $this->filterByCampus(Personnel::with('designation')
                    ->whereHas('designation', function ($q) use ($teachingManagementType) {
                        $q->where('management_type_id', $teachingManagementType->id);
                    })->where('civil_status', $civilStatus)->where('sex', 'FEMALE'))->count();
            }
        }
        return array(
            'male' => $teachingMaleByCivilStatus,
            'female' => $teachingFemaleByCivilStatus,
        );
    }

    public function getTotalTeachingEmployeesByGenderByEducationLevel(): array
    {
        $teachingManagementTypes = ManagementType::where('classification', ManagementType::CLASSIFICATION_TEACHING)->get();
        $teachingMaleByEducationLevel = [];
        $teachingFemaleByEducationLevel = [];

        foreach ($teachingManagementTypes as $teachingManagementType) {
            foreach (PersonnelEducational::ALL_TEACHING_EDUCATION_LEVELS as $teachingEducationLevel) {
                if (!isset($teachingMaleByEducationLevel[$teachingEducationLevel])) {
                    $teachingMaleByEducationLevel[$teachingEducationLevel] = 0;
                }
                $teachingMaleByEducationLevel[$teachingEducationLevel] += $this->filterByCampus(Personnel::with('designation', 'educational')
                    ->whereHas('designation', function ($q) use ($teachingManagementType) {
                        $q->where('management_type_id', $teachingManagementType->id);
                    })->whereHas('educational', function ($q) use ($teachingEducationLevel) {
                        $q->where('education_level', $teachingEducationLevel);
                    })->where('sex', 'MALE'))->count();

                if (!isset($teachingFemaleByEducationLevel[$teachingEducationLevel])) {
                    $teachingFemaleByEducationLevel[$teachingEducationLevel] = 0;
                }
                $teachingFemaleByEducationLevel[$teachingEducationLevel] += $this->filterByCampus(Personnel::with('designation', 'educational')
                    ->whereHas('designation', function ($q) use ($teachingManagementType) {
                        $q->where('management_type_id', $teachingManagementType->id);
                    })->whereHas('educational', function ($q) use ($teachingEducationLevel) {
                        $q->where('education_level', $teachingEducationLevel);
                    })->where('sex', 'FEMALE'))->count();
            }
        }

        return array(
            'male' => $teachingMaleByEducationLevel,
            'female' => $teachingFemaleByEducationLevel,
        );
    }

    public function getTotalNonTeachingEmployeesByGenderByCivilStatus(): array
    {
        $nonTeachingManagementTypes = ManagementType::where('classification', ManagementType::CLASSIFICATION_NON_TEACHING)->get();

        $nonTeachingMaleByCivilStatus = [];
        $nonTeachingFemaleByCivilStatus = [];
        foreach ($nonTeachingManagementTypes as $nonTeachingManagementType) {
            foreach (Personnel::CIVIL_STATUSES as $civilStatus) {
                if (!isset($nonTeachingMaleByCivilStatus[$civilStatus])) {
                    $nonTeachingMaleByCivilStatus[$civilStatus] = 0;
                }
                $nonTeachingMaleByCivilStatus[$civilStatus] += $this->filterByCampus(Personnel::with('designation')
                    ->whereHas('designation', function ($q) use ($nonTeachingManagementType) {
                        $q->where('management_type_id', $nonTeachingManagementType->id);
                    })->where('civil_status', $civilStatus)->where('sex', 'MALE'))->count();

                if (!isset($nonTeachingFemaleByCivilStatus[$civilStatus])) {
                    $nonTeachingFemaleByCivilStatus[$civilStatus] = 0;
                }
                $nonTeachingFemaleByCivilStatus[$civilStatus] += $this->filterByCampus(Personnel::with('designation')
                    ->whereHas('designation', function ($q) use ($nonTeachingManagementType) {
                        $q->where('management_type_id', $nonTeachingManagementType->id);
                    })->where('civil_status', $civilStatus)->where('sex', 'FEMALE'))->count();
            }
        }
        return array(
            'male' => $nonTeachingMaleByCivilStatus,
            'female' => $nonTeachingFemaleByCivilStatus,
        );
    }

    public function getTotalNonTeachingEmployeesByGenderByEducationLevel(): array
    {
        $nonTeachingManagementTypes = ManagementType::where('classification', ManagementType::CLASSIFICATION_NON_TEACHING)->get();
        $nonTeachingMaleByEducationLevel = [];
        $nonTeachingFemaleByEducationLevel = [];

        foreach ($nonTeachingManagementTypes as $nonTeachingManagementType) {
            foreach (PersonnelEducational::ALL_EDUCATION_LEVELS as $educationLevel) {
                if (!isset($nonTeachingMaleByEducationLevel[$educationLevel])) {
                    $nonTeachingMaleByEducationLevel[$educationLevel] = 0;
                }
                $nonTeachingMaleByEducationLevel[$educationLevel] += $this->filterByCampus(Personnel::with('designation', 'educational')
                    ->whereHas('designation', function ($q) use ($nonTeachingManagementType) {
                        $q->where('management_type_id', $nonTeachingManagementType->id);
                    })->whereHas('educational', function ($q) use ($educationLevel) {
                        $q->where('education_level', $educationLevel);
                    })->where('sex', 'MALE'))->count();

                if (!isset($nonTeachingFemaleByEducationLevel[$educationLevel])) {
                    $nonTeachingFemaleByEducationLevel[$educationLevel] = 0;
                }
                $nonTeachingFemaleByEducationLevel[$educationLevel] += $this->filterByCampus(Personnel::with('designation', 'educational')
                    ->whereHas('designation', function ($q) use ($nonTeachingManagementType) {
                        $q->where('management_type_id', $nonTeachingManagementType->id);
                    })->whereHas('educational', function ($q) use ($educationLevel) {
                        $q->where('education_level', $educationLevel);
                    })->where('sex', 'FEMALE'))->count();
            }
        }

        return array(
            'male' => $nonTeachingMaleByEducationLevel,
            'female' => $nonTeachingFemaleByEducationLevel,
        );
    }

    public function getTotalEmployeesEncodedByStatusByUser(User $user): array
    {
        $userId = $user->id;
        return array(
            StatusSupport::STATUS_PENDING => Personnel::where([
                ['status', '=', StatusSupport::STATUS_PENDING],
                ['created_by', '=', $userId],
            ])->count(),
            StatusSupport::STATUS_APPROVED => Personnel::where([
                ['status', '=', StatusSupport::STATUS_APPROVED],
                ['created_by', '=', $userId],
            ])->count(),
            StatusSupport::STATUS_ONHOLD => Personnel::where([
                ['status', '=', StatusSupport::STATUS_ONHOLD],
                ['created_by', '=', $userId],
            ])->count(),
            StatusSupport::STATUS_REJECTED => Personnel::where([
                ['status', '=', StatusSupport::STATUS_REJECTED],
                ['created_by', '=', $userId],
            ])->count(),
        );
    }

    public function getTotalEmployeesReviewedByStatusByUser(User $user): array
    {
        $userId = $user->id;
        return array(
            StatusSupport::STATUS_APPROVED => Personnel::where([
                ['status', '=', StatusSupport::STATUS_APPROVED],
                ['reviewed_by', '=', $userId],
            ])->count(),
            StatusSupport::STATUS_ONHOLD => Personnel::where([
                ['status', '=', StatusSupport::STATUS_ONHOLD],
                ['reviewed_by', '=', $userId],
            ])->count(),
            StatusSupport::STATUS_REJECTED => Personnel::where([
                ['status', '=', StatusSupport::STATUS_REJECTED],
                ['reviewed_by', '=', $userId],
            ])->count(),
        );
    }

    public function getTotalEmployeesAwaitingReviewByCampus(int $campusId)
    {
        return Personnel::where([
            ['campus_id', '=', $campusId],
            ['status', '=', StatusSupport::STATUS_PENDING]
        ])->count();
    }
}
