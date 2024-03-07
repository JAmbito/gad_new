<?php

namespace App\Exports;

class ManagementTypeReportExport extends AbstractMultipleCriteriaReportExport
{
    public const REPORT_TYPE = 'management_type';
    public function title(): string
    {
        return 'Management Type';
    }

    public function getReportTitle(): string
    {
        return 'No. of employees per gender per management type as of '.date('F d, Y');
    }

    public function array(): array
    {
        $report = $this->reportGeneratorService->getTotalEmployeesByGenderByManagementType();

        return $this->prepare($report);
    }
}
