<?php

namespace App\Exports;

class NonTeachingCivilStatusReportExport extends AbstractMultipleCriteriaReportExport
{
    public const REPORT_TYPE = 'non_teaching_civil_status';
    public function title(): string
    {
        return 'Non-Teaching Per Civil Status';
    }

    public function array(): array
    {
        return $this->prepare($this->reportGeneratorService->getTotalNonTeachingEmployeesByGenderByCivilStatus());
    }

    public function getReportTitle(): string
    {
        return 'No. of non-teaching employees per civil status per gender as of '.date('F d, Y');
    }
}
