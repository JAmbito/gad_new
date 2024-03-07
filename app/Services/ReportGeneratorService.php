<?php

namespace App\Services;

use App\Campus;
use App\ManagementType;
use App\PersonnelInformation;
use App\PersonnelEducational;
use App\PersonnelVersion;
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
            return $model->where('personnel_information.campus_id', $campusId);
        }

        return $model;
    }

    public function getTotalEmployeesByGender(): array
    {
        return array(
            'male' => PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) {
                $this->filterByCampus($q->where('sex', 'MALE'));
            })->count(),
            'female' => PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) {
                $this->filterByCampus($q->where('sex', 'FEMALE'));
            })->count()
        );
    }

    public function getTotalEmployeesByGenderByManagementType(): array
    {
        $maleByManagementType = [];
        $femaleByManagementType = [];
        foreach (ManagementType::all() as $managementType) {
            $maleByManagementType[$managementType->management_type] = PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) use ($managementType) {
                $this->filterByCampus($q->with('designation')
                    ->whereHas('designation', function ($q) use ($managementType) {
                        $q->where('management_type_id', $managementType->id);
                    })->where('sex', 'MALE'));
            })->count();

            $femaleByManagementType[$managementType->management_type] = PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) use ($managementType) {
                $this->filterByCampus($q->with('designation')
                    ->whereHas('designation', function ($q) use ($managementType) {
                        $q->where('management_type_id', $managementType->id);
                    })->where('sex', 'FEMALE'));
            })->count();
        }

        return array(
            'male' => $maleByManagementType,
            'female' => $femaleByManagementType
        );
    }

    public function getTotalDisabledEmployeesByGender(): array
    {
        return array(
            'male' => PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) {
                $this->filterByCampus($q->with('question')->whereHas('question', function ($q) {
                    $q->where('question_40b', 'yes');
                })->where('sex', 'MALE'));
            })->count(),
            'female' => PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) {
                $this->filterByCampus($q->with('question')->whereHas('question', function ($q) {
                    $q->where('question_40b', 'yes');
                })->where('sex', 'FEMALE'));
            })->count()
        );
    }

    public function getTotalIndigenousEmployeesByGender(): array
    {
        return array(
            'male' => PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) {
                $this->filterByCampus($q->with('question')->whereHas('question', function ($q) {
                    $q->where('question_40a', 'yes');
                })->where('sex', 'MALE'));
            })->count(),
            'female' => PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) {
                $this->filterByCampus($q->with('question')->whereHas('question', function ($q) {
                    $q->where('question_40a', 'yes');
                })->where('sex', 'FEMALE'));
            })->count(),
        );
    }

    public function getTotalSoloParentEmployeesByGender(): array
    {
        return array(
            'male' => PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) {
                $this->filterByCampus($q->with('question')->whereHas('question', function ($q2) {
                    $q2->where('question_40c', 'yes');
                })->where('sex', 'MALE'));
            })->count(),
            'female' => PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) {
                $this->filterByCampus($q->with('question')->whereHas('question', function ($q2) {
                    $q2->where('question_40c', 'yes');
                })->where('sex', 'FEMALE'));
            })->count(),
        );
    }

    public function getTotalEmployeesWithYoungChildrenByGender(int $maximumAge): array
    {
        return array(
            'male' => PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) use ($maximumAge) {
                $this->filterByCampus($q->withCount('children')->whereHas('children', function ($q) use ($maximumAge) {
                    $q->where(Db::raw("DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), children_birthday)), '%Y') + 0"), '<', $maximumAge);
                })->where('sex', 'MALE'));
            })->count(),
            'female' => PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) use ($maximumAge) {
                $this->filterByCampus($q->withCount('children')->whereHas('children', function ($q) use ($maximumAge) {
                    $q->where(Db::raw("DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), children_birthday)), '%Y') + 0"), '<', $maximumAge);
                })->where('sex', 'FEMALE'));
            })->count()
        );
    }

    public function getTotalEmployeesWithDisabledChildrenByGender(): array
    {
        return array(
            'male' => PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) {
                $this->filterByCampus($q->withCount('children')->whereHas('children', function ($q) {
                    $q->where('children_disability', '!=', '')->where('children_disability', '!=', null);
                })->where('sex', 'MALE'));
            })->count(),
            'female' => PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) {
                $this->filterByCampus($q->withCount('children')->whereHas('children', function ($q) {
                    $q->where('children_disability', '!=', '')->where('children_disability', '!=', null);
                })->where('sex', 'FEMALE'));
            })->count()
        );
    }

    public function getTotalEmployeesByGenderByEmploymentStatus(): array
    {
        $maleByEmploymentStatus = [];
        $femaleByEmploymentStatus = [];
        foreach (PersonnelInformation::EMPLOYEE_STATUSES as $employmentStatus) {
            $maleByEmploymentStatus[$employmentStatus] = PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) use ($employmentStatus) {
                $this->filterByCampus($q->where('employee_status', $employmentStatus)->where('sex', 'MALE'));
            })->count();
            $femaleByEmploymentStatus[$employmentStatus] = PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) use ($employmentStatus) {
                $this->filterByCampus($q->where('employee_status', $employmentStatus)->where('sex', 'FEMALE'));
            })->count();
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
            foreach (PersonnelInformation::CIVIL_STATUSES as $civilStatus) {
                if (!isset($teachingMaleByCivilStatus[$civilStatus])) {
                    $teachingMaleByCivilStatus[$civilStatus] = 0;
                }
                $teachingMaleByCivilStatus[$civilStatus] += PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) use ($teachingManagementType, $civilStatus) {
                    $this->filterByCampus($q->with('designation')
                        ->whereHas('designation', function ($q) use ($teachingManagementType) {
                            $q->where('management_type_id', $teachingManagementType->id);
                        })->where('civil_status', $civilStatus)->where('sex', 'MALE'));
                })->count();

                if (!isset($teachingFemaleByCivilStatus[$civilStatus])) {
                    $teachingFemaleByCivilStatus[$civilStatus] = 0;
                }
                $teachingFemaleByCivilStatus[$civilStatus] += PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) use ($teachingManagementType, $civilStatus) {
                    $this->filterByCampus($q->with('designation')
                        ->whereHas('designation', function ($q) use ($teachingManagementType) {
                            $q->where('management_type_id', $teachingManagementType->id);
                        })->where('civil_status', $civilStatus)->where('sex', 'FEMALE'));
                })->count();
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
                $teachingMaleByEducationLevel[$teachingEducationLevel] += PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) use ($teachingManagementType, $teachingEducationLevel) {
                    $this->filterByCampus($q->with('designation', 'educational')
                        ->whereHas('designation', function ($q) use ($teachingManagementType) {
                            $q->where('management_type_id', $teachingManagementType->id);
                        })->whereHas('educational', function ($q) use ($teachingEducationLevel) {
                            $q->where('education_level', $teachingEducationLevel);
                        })->where('sex', 'MALE'));
                })->count();

                if (!isset($teachingFemaleByEducationLevel[$teachingEducationLevel])) {
                    $teachingFemaleByEducationLevel[$teachingEducationLevel] = 0;
                }
                $teachingFemaleByEducationLevel[$teachingEducationLevel] += PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) use ($teachingManagementType, $teachingEducationLevel) {
                    $this->filterByCampus($q->with('designation', 'educational')
                        ->whereHas('designation', function ($q) use ($teachingManagementType) {
                            $q->where('management_type_id', $teachingManagementType->id);
                        })->whereHas('educational', function ($q) use ($teachingEducationLevel) {
                            $q->where('education_level', $teachingEducationLevel);
                        })->where('sex', 'FEMALE'));
                })->count();
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
            foreach (PersonnelInformation::CIVIL_STATUSES as $civilStatus) {
                if (!isset($nonTeachingMaleByCivilStatus[$civilStatus])) {
                    $nonTeachingMaleByCivilStatus[$civilStatus] = 0;
                }
                $nonTeachingMaleByCivilStatus[$civilStatus] += PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) use ($nonTeachingManagementType, $civilStatus) {
                    $this->filterByCampus($q->with('designation')
                        ->whereHas('designation', function ($q) use ($nonTeachingManagementType) {
                            $q->where('management_type_id', $nonTeachingManagementType->id);
                        })->where('civil_status', $civilStatus)->where('sex', 'MALE'));
                })->count();

                if (!isset($nonTeachingFemaleByCivilStatus[$civilStatus])) {
                    $nonTeachingFemaleByCivilStatus[$civilStatus] = 0;
                }
                $nonTeachingFemaleByCivilStatus[$civilStatus] += PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) use ($nonTeachingManagementType, $civilStatus) {
                    $this->filterByCampus($q->with('designation')
                        ->whereHas('designation', function ($q) use ($nonTeachingManagementType) {
                            $q->where('management_type_id', $nonTeachingManagementType->id);
                        })->where('civil_status', $civilStatus)->where('sex', 'FEMALE'));
                })->count();
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
                $nonTeachingMaleByEducationLevel[$educationLevel] += PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) use ($nonTeachingManagementType, $educationLevel) {
                    $this->filterByCampus($q->with('designation', 'educational')
                        ->whereHas('designation', function ($q) use ($nonTeachingManagementType) {
                            $q->where('management_type_id', $nonTeachingManagementType->id);
                        })->whereHas('educational', function ($q) use ($educationLevel) {
                            $q->where('education_level', $educationLevel);
                        })->where('sex', 'MALE'));
                })->count();

                if (!isset($nonTeachingFemaleByEducationLevel[$educationLevel])) {
                    $nonTeachingFemaleByEducationLevel[$educationLevel] = 0;
                }
                $nonTeachingFemaleByEducationLevel[$educationLevel] += PersonnelVersion::where('is_current', true)->whereHas('personnel_information', function ($q) use ($nonTeachingManagementType, $educationLevel) {
                    $this->filterByCampus($q->with('designation', 'educational')
                        ->whereHas('designation', function ($q) use ($nonTeachingManagementType) {
                            $q->where('management_type_id', $nonTeachingManagementType->id);
                        })->whereHas('educational', function ($q) use ($educationLevel) {
                            $q->where('education_level', $educationLevel);
                        })->where('sex', 'FEMALE'));
                })->count();
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
            StatusSupport::STATUS_PENDING => PersonnelVersion::whereHas('personnel_information', function ($q) use ($userId) {
                $q->where([
                    ['status', '=', StatusSupport::STATUS_PENDING],
                    ['created_by', '=', $userId],
                ]);
            })->count(),
            StatusSupport::STATUS_APPROVED => PersonnelVersion::whereHas('personnel_information', function ($q) use ($userId) {
                $q->where([
                    ['status', '=', StatusSupport::STATUS_APPROVED],
                    ['created_by', '=', $userId],
                ]);
            })->count(),
            StatusSupport::STATUS_ONHOLD => PersonnelVersion::whereHas('personnel_information', function ($q) use ($userId) {
                $q->where([
                    ['status', '=', StatusSupport::STATUS_ONHOLD],
                    ['created_by', '=', $userId],
                ]);
            })->count(),
            StatusSupport::STATUS_REJECTED => PersonnelVersion::whereHas('personnel_information', function ($q) use ($userId) {
                $q->where([
                    ['status', '=', StatusSupport::STATUS_REJECTED],
                    ['created_by', '=', $userId],
                ]);
            })->count(),
        );
    }

    public function getTotalEmployeesReviewedByStatusByUser(User $user): array
    {
        $userId = $user->id;
        return array(
            StatusSupport::STATUS_APPROVED => PersonnelVersion::whereHas('personnel_information', function ($q) use ($userId) {
                $q->where([
                    ['status', '=', StatusSupport::STATUS_APPROVED],
                    ['reviewed_by', '=', $userId],
                ]);
            })->count(),
            StatusSupport::STATUS_ONHOLD => PersonnelVersion::whereHas('personnel_information', function ($q) use ($userId) {
                $q->where([
                    ['status', '=', StatusSupport::STATUS_ONHOLD],
                    ['reviewed_by', '=', $userId],
                ]);
            })->count(),
            StatusSupport::STATUS_REJECTED => PersonnelVersion::whereHas('personnel_information', function ($q) use ($userId) {
                $q->where([
                    ['status', '=', StatusSupport::STATUS_REJECTED],
                    ['reviewed_by', '=', $userId],
                ]);
            })->count(),
        );
    }

    public function getTotalEmployeesAwaitingReviewByCampus(int $campusId)
    {
        return PersonnelVersion::whereHas('personnel_information', function ($q) use ($campusId) {
            $q->where([
                ['campus_id', '=', $campusId],
                ['status', '=', StatusSupport::STATUS_PENDING]
            ]);
        })->count();
    }
}
