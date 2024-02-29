<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Services\ReportGeneratorService;
use App\Support\RoleSupport;
use App\Support\StatusSupport;
use Illuminate\Http\Request;
use App\Personnel;
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
        if ($roleName === RoleSupport::ROLE_ENCODER) {
            $total_employees_encoded_by_status = $reportGeneratorService->getTotalEmployeesEncodedByStatusByUser(Auth::user());
            $total_employees_encoded = Personnel::where('created_by', Auth::user()->id)->orderBy('id', 'desc')->count();
            $variables = compact('total_employees_encoded_by_status', 'total_employees_encoded');
        } elseif ($roleName === RoleSupport::ROLE_APPROVER) {
            $total_employees_reviewed_by_status = $reportGeneratorService->getTotalEmployeesReviewedByStatusByUser(Auth::user());
            $total_employees_awaiting_review = $reportGeneratorService->getTotalEmployeesAwaitingReviewByCampus(Auth::user()->campus->id);
            $total_employees_reviewed = Personnel::where('reviewed_by', Auth::user()->id)->whereIn('status', [StatusSupport::STATUS_APPROVED, StatusSupport::STATUS_ONHOLD, StatusSupport::STATUS_REJECTED])
                ->orderBy('id', 'desc')->count();
            $variables = compact('total_employees_reviewed_by_status', 'total_employees_awaiting_review', 'total_employees_reviewed');
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
                $personnels = Personnel::where('created_by', Auth::user()->id)->orderBy('id', 'desc')->with('reviewed_by', 'created_by', 'academic_rank', 'administrative_rank', 'designation', 'department', 'campus')->get();
            } else {
                $campus = Auth::user()->campus;
                if ($campus) {
                    $personnels = Personnel::where('campus_id', $campus->id)->orderBy('id', 'desc')->with('reviewed_by', 'created_by', 'academic_rank', 'administrative_rank', 'designation', 'department', 'campus')->get();
                } else {
                    $personnels = Personnel::orderBy('id', 'desc')->with('reviewed_by', 'created_by', 'academic_rank', 'administrative_rank', 'designation', 'department', 'campus')->get();
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
