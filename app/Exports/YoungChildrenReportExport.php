<?php

namespace App\Exports;

class YoungChildrenReportExport extends AbstractReportExport
{
    public const REPORT_TYPE = 'young_children';
    public function title(): string
    {
        return 'With Children Below 7 Years Old';
    }

    public function array(): array
    {
        return $this->prepare($this->reportGeneratorService->getTotalEmployeesWithYoungChildrenByGender(7));
    }

    public function getReportTitle(): string
    {
        return 'No. of employees with children below 7 years old per gender as of '.date('F d, Y');
    }
}
