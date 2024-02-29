<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Exports\DisabledChildrenReportExport;
use App\Exports\DisabledReportExport;
use App\Exports\EmploymentStatusExportReport;
use App\Exports\IndigenousReportExport;
use App\Exports\MutipleSheetExport;
use App\Exports\ManagementTypeReportExport;
use App\Exports\NonTeachingCivilStatusReportExport;
use App\Exports\NonTeachingEducationLevelReportExport;
use App\Exports\OverallReportExport;
use App\Exports\SoloParentsReportExport;
use App\Exports\TeachingCivilStatusReportExport;
use App\Exports\TeachingEducationLevelReportExport;
use App\Exports\YoungChildrenReportExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ReportsController extends Controller
{
    public function index()
    {
        $campuses = Campus::all();
        return view('backend.pages.reports.reports', compact('campuses'));
    }

    public function download(
        Request $request,
        OverallReportExport $overallReportExport,
        ManagementTypeReportExport $managementTypeReportExport,
        DisabledReportExport $disabledReportExport,
        IndigenousReportExport $indigenousReportExport,
        SoloParentsReportExport $soloParentsReportExport,
        YoungChildrenReportExport $youngChildrenReportExport,
        DisabledChildrenReportExport $disabledChildrenReportExport,
        EmploymentStatusExportReport $employmentStatusExportReport,
        TeachingCivilStatusReportExport $teachingCivilStatusReportExport,
        TeachingEducationLevelReportExport $teachingEducationLevelReportExport,
        NonTeachingCivilStatusReportExport $nonTeachingCivilStatusReportExport,
        NonTeachingEducationLevelReportExport $nonTeachingEducationLevelReportExport,
        MutipleSheetExport $mutipleSheetExport
    ) {
        $this->validate($request, [
            'report_types' => ['required'],
        ]);
        $data = $request->request->all();
        $reportTypes = $data['report_types'];
        $campusFilePrefix = 'all_campuses';

        if (isset($data['campus_id'])) {
            Campus::$currentCampusId = $data['campus_id'];
        } else {
            Campus::$currentCampusId = Auth::user()->campus ? Auth::user()->campus->id : null;
        }

        if (!is_null(Campus::$currentCampusId)) {
            $campusName = Campus::find(Campus::$currentCampusId)->campus_name;
            $campusFilePrefix = strtolower(str_replace(' ', '_', $campusName));
        }

        foreach ($reportTypes as $reportType) {
            switch ($reportType) {
                case OverallReportExport::REPORT_TYPE:
                    $mutipleSheetExport->addReport($overallReportExport);
                    break;
                case ManagementTypeReportExport::REPORT_TYPE:
                    $mutipleSheetExport->addReport($managementTypeReportExport);
                    break;
                case DisabledReportExport::REPORT_TYPE:
                    $mutipleSheetExport->addReport($disabledReportExport);
                    break;
                case IndigenousReportExport::REPORT_TYPE:
                    $mutipleSheetExport->addReport($indigenousReportExport);
                    break;
                case SoloParentsReportExport::REPORT_TYPE:
                    $mutipleSheetExport->addReport($soloParentsReportExport);
                    break;
                case YoungChildrenReportExport::REPORT_TYPE:
                    $mutipleSheetExport->addReport($youngChildrenReportExport);
                    break;
                case DisabledChildrenReportExport::REPORT_TYPE:
                    $mutipleSheetExport->addReport($disabledChildrenReportExport);
                    break;
                case EmploymentStatusExportReport::REPORT_TYPE:
                    $mutipleSheetExport->addReport($employmentStatusExportReport);
                    break;
                case TeachingCivilStatusReportExport::REPORT_TYPE:
                    $mutipleSheetExport->addReport($teachingCivilStatusReportExport);
                    break;
                case TeachingEducationLevelReportExport::REPORT_TYPE:
                    $mutipleSheetExport->addReport($teachingEducationLevelReportExport);
                    break;
                case NonTeachingCivilStatusReportExport::REPORT_TYPE:
                    $mutipleSheetExport->addReport($nonTeachingCivilStatusReportExport);
                    break;
                case NonTeachingEducationLevelReportExport::REPORT_TYPE:
                    $mutipleSheetExport->addReport($nonTeachingEducationLevelReportExport);
                    break;
                default:
                    throw new \Exception('No report found for type '. $reportType);
            }
        }

        return Excel::download($mutipleSheetExport, date('Ymdhis')."_{$campusFilePrefix}_reports.xlsx");
    }
}
