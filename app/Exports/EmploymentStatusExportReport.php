<?php

namespace App\Exports;

class EmploymentStatusExportReport extends AbstractMultipleCriteriaReportExport
{
    public const REPORT_TYPE = 'employment_status';
    public function title(): string
    {
        return 'Employment Status';
    }

    public function array(): array
    {
        return $this->prepare($this->reportGeneratorService->getTotalEmployeesByGenderByEmploymentStatus());
    }

    public function getReportTitle(): string
    {
        return 'No. of employees per employment status as of '.date('F d, Y');
    }
}
