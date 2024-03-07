<?php

namespace App\Exports;

class TeachingCivilStatusReportExport extends AbstractMultipleCriteriaReportExport
{
    public const REPORT_TYPE = 'teaching_civil_status';
    public function title(): string
    {
        return 'Teaching Per Civil Status';
    }

    public function array(): array
    {
        return $this->prepare($this->reportGeneratorService->getTotalTeachingEmployeesByGenderByCivilStatus());
    }

    public function getReportTitle(): string
    {
        return 'No. of teaching employees per civil status per gender as of '.date('F d, Y');
    }
}
