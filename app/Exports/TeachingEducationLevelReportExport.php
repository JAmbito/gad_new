<?php

namespace App\Exports;

class TeachingEducationLevelReportExport extends AbstractMultipleCriteriaReportExport
{
    public const REPORT_TYPE = 'teaching_education_level';
    public function title(): string
    {
        return 'Teaching Per Education Level';
    }

    public function array(): array
    {
        return $this->prepare($this->reportGeneratorService->getTotalTeachingEmployeesByGenderByEducationLevel());
    }

    public function getReportTitle(): string
    {
        return 'No. of teaching employees per education level per gender as of '.date('F d, Y');
    }
}
