<?php

namespace App\Http\Controllers;

use App\Campus;
use App\EmploymentStatus;
use App\PersonnelVersion;
use App\Services\ReportGeneratorService;
use App\Support\RoleSupport;
use App\Support\StatusSupport;
use Illuminate\Http\Request;
use App\PersonnelInformation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class DashboardController extends Controller
{
    public function index(ReportGeneratorService $reportGeneratorService)
    {
        $roleName = Auth::user()->getRoleNames()[0];
        $variables = [];
        $employment_statuses = EmploymentStatus::orderBy('id')->get();
        $variables = compact('employment_statuses');
        if ($roleName === RoleSupport::ROLE_ENCODER) {
            $total_employees_encoded_by_status = $reportGeneratorService->getTotalEmployeesEncodedByStatusByUser(Auth::user());
            $total_employees_encoded = PersonnelVersion::whereHas('personnel_information', function ($q) {
                $q->where([
                    ['created_by', '=', Auth::user()->id],
                ]);
            })->count();
            $variables = compact('total_employees_encoded_by_status', 'total_employees_encoded', 'employment_statuses');
        } elseif ($roleName === RoleSupport::ROLE_APPROVER) {
            $total_employees_reviewed_by_status = $reportGeneratorService->getTotalEmployeesReviewedByStatusByUser(Auth::user());
            $total_employees_awaiting_review = $reportGeneratorService->getTotalEmployeesAwaitingReviewByCampus(Auth::user()->campus->id);
            $total_employees_reviewed = PersonnelVersion::whereHas('personnel_information', function ($q) {
                $q->where('reviewed_by', Auth::user()->id)->whereIn('status', [StatusSupport::STATUS_APPROVED, StatusSupport::STATUS_ONHOLD, StatusSupport::STATUS_REJECTED]);
            })->count();
            $variables = compact('total_employees_reviewed_by_status', 'total_employees_awaiting_review', 'total_employees_reviewed', 'employment_statuses');
        }

        return view('backend.pages.dashboard.dashboard', $variables);
    }

    public function get_records(ReportGeneratorService $reportGeneratorService)
    {
        Campus::$currentCampusId = Auth::user()->campus ? Auth::user()->campus->id : null;

        $total_employees_by_gender = $reportGeneratorService->getTotalEmployeesByGender();
        $total_employees_by_gender_by_management_type = $reportGeneratorService->getTotalEmployeesByGenderByManagementType();
        $total_disabled_employees_by_gender = $reportGeneratorService->getTotalDisabledEmployeesByGender();
        $total_indigenous_employees_by_gender = $reportGeneratorService->getTotalIndigenousEmployeesByGender();
        $total_solo_parent_employees_by_gender = $reportGeneratorService->getTotalSoloParentEmployeesByGender();
        $total_employees_with_young_children_by_gender = $reportGeneratorService->getTotalEmployeesWithYoungChildrenByGender(7);
        $total_employees_with_disabled_children_by_gender = $reportGeneratorService->getTotalEmployeesWithDisabledChildrenByGender();
        $total_employees_by_gender_by_employment_status = $reportGeneratorService->getTotalEmployeesByGenderByEmploymentStatus();
        $total_teaching_employees_by_gender_by_civil_status = $reportGeneratorService->getTotalTeachingEmployeesByGenderByCivilStatus();
        $total_teaching_employees_by_gender_by_education_level = $reportGeneratorService->getTotalTeachingEmployeesByGenderByEducationLevel();
        $total_non_teaching_employees_by_gender_by_civil_status = $reportGeneratorService->getTotalNonTeachingEmployeesByGenderByCivilStatus();
        $total_non_teaching_employees_by_gender_by_education_level = $reportGeneratorService->getTotalNonTeachingEmployeesByGenderByEducationLevel();

        return response()->json(compact(
            'total_employees_by_gender',
            'total_employees_by_gender_by_management_type',
            'total_disabled_employees_by_gender',
            'total_employees_with_young_children_by_gender',
            'total_employees_with_disabled_children_by_gender',
            'total_indigenous_employees_by_gender',
            'total_solo_parent_employees_by_gender',
            'total_employees_by_gender_by_employment_status',
            'total_teaching_employees_by_gender_by_civil_status',
            'total_teaching_employees_by_gender_by_education_level',
            'total_non_teaching_employees_by_gender_by_civil_status',
            'total_non_teaching_employees_by_gender_by_education_level'
        ));
    }

    public function getPersonnels()
    {
        if (request()->ajax()) {
            $role = Auth::user()->getRoleNames()[0];
            if ($role === RoleSupport::ROLE_ENCODER) {
                $personnels = PersonnelVersion::whereHas('personnel_information', function ($q) {
                    $q->where([
                        [
                            'campus_id', '=', Auth::user()->campus ? Auth::user()->campus->id : null,
                        ],
                        [
                            'created_by', '=', Auth::user()->id
                        ]
                    ]);
                })->orderBy('id', 'desc')->with(
                    'personnel_information.reviewed_by',
                    'personnel_information.created_by',
                    'personnel_information.academic_rank',
                    'personnel_information.administrative_rank',
                    'personnel_information.designation',
                    'personnel_information.department',
                    'personnel_information.campus'
                )->get();
            } else {
                $campus = Auth::user()->campus;
                if ($campus) {
                    $personnels = PersonnelInformation::where('campus_id', $campus->id)->orderBy('id', 'desc')->with('reviewed_by', 'created_by', 'academic_rank', 'administrative_rank', 'designation', 'department', 'campus')->get();
                } else {
                    $personnels = PersonnelInformation::orderBy('id', 'desc')->with('reviewed_by', 'created_by', 'academic_rank', 'administrative_rank', 'designation', 'department', 'campus')->get();
                }
            }

            return datatables()->of(
                $personnels
            )
                ->addIndexColumn()
                ->make(true);
        }
    }
}
