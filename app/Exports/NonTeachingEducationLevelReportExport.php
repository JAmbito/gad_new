<?php

namespace App\Exports;

class NonTeachingEducationLevelReportExport extends AbstractMultipleCriteriaReportExport
{
    public const REPORT_TYPE = 'non_teaching_education_level';
    public function title(): string
    {
        return 'Non-Teaching Per Education Level';
    }

    public function array(): array
    {
        return $this->prepare($this->reportGeneratorService->getTotalNonTeachingEmployeesByGenderByEducationLevel());
    }

    public function getReportTitle(): string
    {
        return 'No. of non-teaching employees per education level per gender as of '.date('F d, Y');
    }
}
